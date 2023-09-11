<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\M_Emails;
use App\Models\M_Leads;
use App\Models\M_Orders;
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
        })->latest();

        $data = $query->paginate($entries);

        return view('admin.leads.menu', [
            "title" => "Leads | Menu",
            "leads" => $data
        ]);
    }

    public function detail($leads_id)
    {
        $leads_data = M_Leads::find($leads_id);
        if (!$leads_data) {
            return response([
                'error' => "No leads has this id : {{ $leads_id }}"
            ]);
        }

        return view('admin.leads.detail', [
            "title" => "Leads | Detail",
            'leads' => $leads_data
        ]);
    }
    public function delete($id)
    {
        $lead = M_Leads::find($id);
        if (!$lead) {
            return response()->json(['error' => 'Lead not found'], 404);
        }

        $lead->emails()->delete();
        $lead->delete();
        return redirect('/leads');
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

        if (!$leads) return response([
            'error' => 'Error occured'
        ]);

        $emailAddresses = [];
        foreach ($request->all() as $fieldName => $fieldValue) {
            if (strpos($fieldName, 'input_') === 0) {
                $emailAddresses[] = $fieldValue;
            }
        }
        // Save to leads_email table
        foreach ($emailAddresses as $email) {
            M_Emails::create([
                'leads_id' => $leads->id,
                'email_name' => $email,
            ]);
        }

        return redirect('/leads');
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
        })->where('client_indicator', '=', '1')
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

        return redirect('/client');
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
            'lead_data' => $lead
        ];
        $mailSubject = $request->subject;
        if (!$lead->hasOneEmail) return response(['error' => "No Email detected in {$lead->business_name}"]);

        $email = new TestMail($mailData, $mailSubject);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $email->attach($file->getRealPath(), [
                'as' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
            ]);
        }
        Mail::to($request->email_name)->send($email);
        return redirect()->back();
    }
}
