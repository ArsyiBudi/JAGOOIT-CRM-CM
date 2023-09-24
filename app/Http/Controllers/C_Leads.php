<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\M_Emails;
use App\Models\M_Leads;
use App\Models\M_Orders;
use App\Models\M_Talents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

use function PHPUnit\Framework\returnSelf;

class C_Leads extends Controller
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

    //? BELOW USED FOR LEADS
    public function fetch(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search', '');
        $sort = $request->input('sort', 'oldest');

        session(['leads_per_page' => $perPage]);
        session(['leads_search' => $search]);

        $entries = session('leads_per_page', 5);
        $search = session('leads_search', '');

        $query = M_Leads::where(function ($query) use ($search) {
            $query->where('business_name', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->orWhere('pic_name', 'like', "%$search%");
        })->where('client_indicator', 0)->latest();

        $data = $query->paginate($entries);

        return view('admin.leads.menu', [
            "title" => "Leads | Menu",
            "leads" => $data
        ]);
    }

    public function detail($leads_id)
    {
        $detail_subject = "Leads";
        $leads_data = M_Leads::find($leads_id);
        if (!$leads_data) {
            return response([
                'error' => "No leads has this id : $leads_id"
            ]);
        }
        if ($leads_data->client_indicator == 1) $detail_subject = "Client";

        return view('admin.leads.detail', [
            "title" => "Leads | Detail",
            'leads' => $leads_data,
            'detail_info' => $detail_subject
        ]);
    }
    public function delete($id)
    {
        $lead = M_Leads::find($id);
        if (!$lead) {
            return response()->json(['error' => 'Lead not found'], 404);
        }
        if ($lead->hasOneActivity) {
            foreach ($lead->ActivityData as $activity)
                $activity->delete();
        }
        if ($lead->hasOneEmail) {
            foreach ($lead->emails as $email) {
                $email->delete();
            }
        }
        if ($lead->hasOneOrder) {
            foreach ($lead->orders as $order) {
                foreach ($order->orderDetails as $order_detail) {
                    $talent = M_Talents::find($order_detail);
                    $talent->is_active = 0;
                    $order_detail->delete();
                }
                $order->delete();
            }
        }
        if ($lead->hasOnePopks) {
            foreach ($lead->popks as $popks) {
                $popks->delete();
            }
        }
        $lead_name = $lead->business_name;
        $lead->delete();
        return back()->with('success', "$lead_name berhasil dihapus");
    }
    public function create(Request $request)
    {
        $field = $request->validate([
            'business_name' => 'required|string',
            'business_sector' => 'required|string',
            'address' => 'required|string',
            'pic_name' => 'required|string',
            'pic_contact_number' => 'required|string'
        ]);

        $leads = M_Leads::create([
            'business_name' => $field['business_name'],
            'business_sector' => $field['business_sector'],
            'address' => $field['address'],
            'pic_name' => $field['pic_name'],
            'pic_contact_number' => $field['pic_contact_number']
        ]);

        if (!$leads)
            return response([
                'error' => 'Error occured'
            ]);

        $emailAddresses = [];
        foreach ($request->all() as $fieldName => $fieldValue) {
            if (strpos($fieldName, 'input_') === 0) {
                $emailAddresses[] = $fieldValue;
            }
        }

        foreach ($emailAddresses as $email) {
            M_Emails::create([
                'leads_id' => $leads->id,
                'email_name' => $email,
            ]);
        }

        return redirect('/leads')->with('success', $leads->business_name . " berhasil ditambahkan");
    }

    //? BELOW USED FOR CLIENT
    public function fetch_client(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search', '');

        session(['client_per_page' => $perPage]);
        session(['client_search' => $search]);

        $entries = session('client_per_page', 5);
        $search = session('client_search', '');

        $data = M_Leads::where(function ($query) use ($search) {
            $query->where('business_name', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->orWhere('pic_name', 'like', "%$search%")
                ->orWhereHas('latestActivityParams', function ($query) use ($search) {
                    $query->where('params_name', 'like', "%$search%");
                });
        })->where('client_indicator', '=', '1')->latest()
            ->paginate($entries);

        return view('admin.client/menu', [
            "title" => "Client | Menu",
            "client" => $data
        ]);
    }

    public function delete_client($client_id)
    {
        $client = M_Leads::find($client_id);
        $client->client_indicator = 0;
        $client->save();
        return back()->with('success', $client->business_name . " dihapus dari client");
    }


    //?THIS CODE ARE FOR OFFER
    public function openOffer($leads_id)
    {
        $lead = M_Leads::find($leads_id);
        $randomId = $this->generateUniqueRandomId();
        return view('admin.leads.offer', [
            "title" => "Leads | Create Offer",
            "lead" => $lead,
            "randomId" => $randomId
        ]);
    }
    public function sendOffer(Request $request, $leads_id)
    {
        $lead = M_Leads::find($leads_id);
        $mailData = [
            'description' => $request->description,
            'lead_data' => $lead,
            'information' => "Proposal Penawaran"
        ];
        $mailSubject = $request->subject;
        if (!$lead->hasOneEmail)
            return back()->with('error', "{$lead->business_name} tidak memiliki email");

        $email = new TestMail($mailData, $mailSubject);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $email->attach($file->getRealPath(), [
                'as' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
            ]);
        }
        Mail::to($request->email_name)->send($email);
        return redirect('leads/offer/' . $leads_id)->with('success', 'Email berhasil terkirim');
    }

    //?This code are for edit

    public function fetchEdit($leads_id)
    {
        $detail_subject = "Leads";
        $lead = M_Leads::find($leads_id);
        if ($lead->client_indicator == 1) $detail_subject = "Client";
        if (!$lead) return back()->with('error', "Tidak ada lead dengan id : $leads_id");
        return view('admin.leads.edit', [
            "title" => "Leads | Edit",
            "subject" => $detail_subject,
            "lead" => $lead
        ]);
    }

    public function deleteEmail($leads_id, $email_id)
    {
        $emailLeadsCheck = M_Emails::where('leads_id', $leads_id)
            -> where('id', $email_id)->first();
        if(!$emailLeadsCheck) return back() -> with('error', "Lead ini tidak memiliki email dengan ID : $email_id");

        $status = M_Emails::find($email_id) -> delete();
        if(!$status) return back() -> with('error', "Email tidak berhasil dihapus");
        return back() -> with('success', "Email berhasil dihapus");
    }

    public function addEmail(Request $request, $leads_id)
    {
        $rule = [
            'email_name' => 'required|email|ends_with:gmail.com'
        ];

        $this -> validate($request, $rule);

        $field = $request -> all();

        $email_name = $field['email_name'];

        $emailExist = M_Emails::where('leads_id', $leads_id)
            ->where('email_name', $email_name)
            ->first();

        if ($emailExist) {
            return back()->with('error', "$email_name Already Taken");
        }

        M_Emails::create([
            'leads_id' => $leads_id,
            'email_name' => $email_name
        ]);

        return back()->with('success', "$email_name berhasil ditambahkan");
    }

    public function edit(Request $request, $leads_id)
    {
        $field = $request->validate([
            'business_name' => 'required',
            'address' => 'required',
            'pic_name' => 'required',
            'pic_contact_number' => 'required',
        ]);

        $lead = M_Leads::find($leads_id);
        $lead->business_name = $field['business_name'];
        $lead->address = $field['address'];
        $lead->pic_name = $field['pic_name'];
        $lead->pic_contact_number = $field['pic_contact_number'];
        $status = $lead->update();

        if (!$status) return back()->with('error', '{$lead -> business_name} tidak berhasil diedit');
        return back()->with('success', "{$lead->business_name} berhasil diedit");
    }
}
