<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Redirect;

class TalentController extends Controller
{
    public function procedure1(Request $req)
    {
        $search = $req->input('search', '');

        $data['talents'] = DB::select("CALL recruitment('" . $search . "')");
        $data['title'] = 'Plan | Recruitment';

        return view('admin.client.plan.recruitment', $data);
    }

    public function destroy($id)
    {
        $talent = DB::table('talents')->where('id', $id);

        if ($talent) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            $deleteResult = $talent->delete();

            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            if ($deleteResult) {
                return redirect('/client/order/plan/recruitment')->with('success', 'Talent deleted successfully');
            } else {
                return redirect('/client/order/plan/recruitment')->with('success', 'Talent deletion failed');
            }
        } else {
            return redirect('/client/order/plan/recruitment')->with('error', 'Talent not found');
        }
    }

    // public function processForm(Request $request){
    // $selectedItems = $request->input('selectedItems', []);
    // $data = \DB::table('talents')->whereIn('id', $selectedItems)->get();

    // return view('client/order/plan/training', ['data' => $data]);
    // }
}
