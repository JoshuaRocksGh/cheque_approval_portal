<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RejectedController extends Controller
{
    //
    function rejected (Request $req, $cheque_id){
        // return $cheque_id;
        $rejected_query = DB::table('details')->where(['id' => $cheque_id])->update(['flag' => 'R']);
        return back();
    }

    function index(){
        $query = DB::table('details')->where(['flag' => 'R'])->get();
        // return $query;
        return view('returns.rejected_cheque', ['uploaded_returns' =>$query]);
    }

}
