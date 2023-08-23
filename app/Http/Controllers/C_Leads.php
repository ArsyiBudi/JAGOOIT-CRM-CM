<?php

namespace App\Http\Controllers;

use App\Models\M_Leads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

use function PHPUnit\Framework\returnSelf;

class C_Leads extends Controller
{
    public function create(Request $request){
        $field = $request -> validate([
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

        if(!$leads) return response([
            'error' => 'Error occured'
        ]);

        return redirect('/leads');
    }

    public function fetch(Request $request){
        $data = DB::table('leads')->paginate(3);
        return view('admin.leads.menu', [
            "title" => "Leads | Menu",
            "leads" => $data
        ]);
    }
}
