<?php

namespace App\Http\Controllers;

use App\Models\M_Emails;
use App\Models\M_Leads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

use function PHPUnit\Framework\returnSelf;

class C_Leads extends Controller
{
    public function fetch(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search', '');
    
        session(['leads_per_page' => $perPage]);
        session(['leads_search' => $search]);

        $entries = session('leads_per_page', 5);
        $search = session('leads_search', '');

        $data = M_Leads::where(function ($query) use ($search) {
            $query->where('business_name', 'like', "%$search%")
                ->orWhere('business_sector', 'like', "%$search%")
                ->orWhere('pic_name', 'like', "%$search%");
        })->paginate($entries);

        return view('admin.leads.menu', [
            "title" => "Leads | Menu",
            "leads" => $data
        ]);
    }

    public function fetch_client(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search', '');
    
        session(['leads_per_page' => $perPage]);
        session(['leads_search' => $search]);

        $entries = session('leads_per_page', 5);
        $search = session('leads_search', '');

        $data = M_Leads::where(function ($query) use ($search) {
            $query->where('business_name', 'like', "%$search%")
                ->orWhere('business_sector', 'like', "%$search%")
                ->orWhere('pic_name', 'like', "%$search%");
        })->where('client_indicator', '=', '1')->paginate($entries);

        return view('admin.client/menu', [
            "title" => "Client | Menu",
            "client" => $data
        ]);
    }

    public function detail($leads_id)
    {
        $leads_data = M_Leads::where('id', '=', "$leads_id")->get();
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

        // Delete related emails
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
}
