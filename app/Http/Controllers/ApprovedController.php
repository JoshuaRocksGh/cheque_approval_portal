<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ApprovedController extends Controller
{
    //

    function approved (Request $req, $cheque_id){
        // return $cheque_id;
        $approved_query = DB::table('details')->where(['id' => $cheque_id])->update(['flag' => 'A']);
        if($approved_query){
            Alert::alert('Cheque Approved', ' ', 'success');
        }else{
            Alert::alert('Error Occured', ' ', 'error');
        }
        return back();
    }

    function index(){
        $query = DB::table('details')->where(['flag' => 'A'])->get();
        // return $query;
        return view('returns.approved_cheque', ['uploaded_returns' =>$query]);
    }

}
