<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_Leads;
use App\Models\M_Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;
use Ramsey\Uuid\Uuid;

class C_Orders extends Controller
{
    public function generateUniqueRandomId()
    {
        $unique = false;
        $randomId = '';
        while (!$unique) {
            $randomId = strtoupper(substr(md5(microtime()), 0, 8));
            if (!M_Orders::where('id', $randomId)->exists()) {
                $unique = true;
            }
        }
        return $randomId;
    }

    //? CODE BELOW ARE USED FOR TRACK
    public function track(Request $request)
    {
        $field = $request->validate([
            'order_id' => 'required'
        ]);
        $order_id = $field['order_id'];

        $order_data = M_Orders::find($field['order_id']);
        if (!$order_data)
            return back()->with('error', "Tidak ada order dengan ID : $order_id");
        return view('clients.track', [
            "title" => "Order | Track",
            "order" => $order_data
        ]);
    }

    public function timeline($order_id)
    {
        $order_data = M_Orders::find($order_id);
        $lead_data = M_Leads::find($order_data->leads_id);
        if (!$order_data)
            return back()->with('error', "Tidak ada order dengan ID : $order_id");
        return view('admin.client.order.timeline', [
            "title" => "Client | Order Timeline",
            "order" => $order_data,
            "lead" => $lead_data
        ]);
    }


    //? CODE BELOW USED FOR FETCH DATA
    public function fetch(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search', '');

        session(['order_per_page' => $perPage]);
        session(['order_search' => $search]);

        $entries = session('order_per_page', 5);
        $search = session('order_search', '');
        $client_indicator = 1;

        $data = M_Orders::where(function ($query) use ($search) {
            $query->where('due_date', 'like', "%$search%")
                ->orWhere('id', 'like', "%$search%")
                ->orWhereHas('leadData', function ($query) use ($search) {
                    $query->where('business_name', 'like', "%$search%");
                })
                ->orWhereHas('globalParams', function ($query) use ($search) {
                    $query->where('params_name', 'like', "%$search%");
                });
        })->whereHas('leadData', function ($query) use ($client_indicator) {
            $query->where('client_indicator', '=', "$client_indicator");
        })->where('order_status', '<', 8)->latest()
            ->paginate($entries);

        return view('admin.client.order.list', [
            "title" => "Client | Order List",
            "order" => $data
        ]);
    }

    public function fetch_history(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search', '');

        session(['order_per_page' => $perPage]);
        session(['order_search' => $search]);

        $entries = session('order_per_page', 5);
        $search = session('order_search', '');
        $client_indicator = 1;

        $data = M_Orders::where(function ($query) use ($search) {
            $query->where('due_date', 'like', "%$search")
                ->orWhere('id', 'like', "%$search%")
                ->orWhereHas('leadData', function ($query) use ($search) {
                    $query->where('business_name', 'like', "%$search%");
                });
        })->whereHas('leadData', function ($query) use ($client_indicator) {
            $query->where('client_indicator', '=', "$client_indicator");
        })
            ->where('order_status', '=', 8)->latest()->paginate($entries);

        return view('admin.client.order.history', [
            "title" => "Client | Order History",
            "orders" => $data
        ]);
    }

    //?CODE BELOW ARE USED FOR CREATING ORDER
    public function newOrder()
    {
        $leads = M_Leads::all();
        $randomId = $this->generateUniqueRandomId();
        return view('admin.client.order.create', [
            "title" => "Client | Create Order",
            "leads" => $leads,
            "randomId" => $randomId
        ]);
    }

    public function create(Request $request)
    {

        $field = $request->validate([
            'business_id' => 'required|int',
            'desired_position' => 'required',
            'needed_qty' => 'required',
            'due_date' => 'required',
            'description' => 'required',
            'characteristic_desc' => 'required',
            'skills_desc' => 'required',
            'budget_estimation' => 'required',
            'tor_file' => 'required'
        ]);

        $tor = $field['tor_file'];
        $fileTorName = time() . '.' . $tor->getClientOriginalExtension();
        $tor->storeAs('public/assets', $fileTorName);

        $order = M_Orders::create([
            'id' => $request->id,
            'leads_id' => $field['business_id'],
            'desired_position' => $field['desired_position'],
            'needed_qty' => $field['needed_qty'],
            'due_date' => $field['due_date'],
            'description' => $field['description'],
            'characteristic_desc' => $field['characteristic_desc'],
            'skills_desc' => $field['skills_desc'],
            'budget_estimation' => $field['budget_estimation'],
            'tor_file' => $fileTorName,

        ]);


        if (!$order)
            return back()->with('error', "Order tidak berhasil dibuat");
        $update = M_Leads::find($field['business_id']);
        $update->client_indicator = 1;
        $status = $update->update();
        if ($status) {
            return redirect('/client/order')->with('success', "Order berhasil dibuat");
        }
    }

    public function downloadPDF($order_id)
    {
        $orderData = M_Orders::find($order_id);

        if (!$orderData) {
            // Handle jika order tidak ditemukan
            return redirect()->back()->with('error', 'Order tidak ditemukan.');
        }

        $torFilePath = storage_path('app/public/assets/' . $orderData->tor_file);

        if (!file_exists($torFilePath)) {
            // Handle jika file PDF tidak ditemukan
            return redirect()->back()->with('error', 'File PDF tidak ditemukan.');
        }

        return response()->file($torFilePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="file_TOR.pdf"',
        ]);
    }



    //?THIS CODE ARE USED FOR SINGLE ORDER
    public function detail($order_id)
    {
        $data = M_Orders::where('id', '=', "$order_id")->first();
        return view('admin.client.order.detail', [
            "title" => "Client | Detail Order",
            "data" => $data
        ]);
    }

    public function delete_order($order_id)
    {
        $delete = M_Orders::find($order_id);
        foreach ($delete->orderDetails as $orderDetail) {
            $orderDetail->delete();
        }
        $delete->delete();
        return redirect()->back()->with('success', "$order_id berhasil dihapus");
    }

    public function finish_order($order_id)
    {
        $selectedTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($selectedTimestamp);

        $update = M_Orders::find($order_id);
        $update->order_status = 8;

        //?Array to use
        $track = ['recruitment', 'training', 'offer', 'appointment', 'probation', 'popks'];
        $end_start = ['start', 'end'];

        $strTimeline = "";
        foreach (range(0, 5) as $timeline_number) {
            foreach (range(0, 1) as $start_end) {
                $strTimeline = "{$end_start[$start_end]}_{$track[$timeline_number]}";
                if (is_null($update->$strTimeline))
                    $update->$strTimeline = $selectedDate;
            }
        }
        $update->update();
        return redirect()->back()->with('success', "$order_id dimasukan kedalam history");
    }
}