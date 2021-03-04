<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiRejectedController extends Controller
{
    //


    function index(){
        $query = DB::table('details')->where(['flag' => 'R'])->get();


        return response()->json([
            'responseCode' => "000",
            'message' => " Successful Displaying Cheque List",
            'data' => $query,

        ], 200);

        // return $query;
        // return view('returns.rejected_cheque', ['uploaded_returns' =>$query]);
    }

    function rejected (Request $req, $cheque_id){
        // return $cheque_id;
        $rejected_query = DB::table('details')->where(['id' => $cheque_id])->update(['flag' => 'R']);

        if($rejected_query)
        {

            return response()->json([
                'responseCode' => "000",
                'message' => " Cheque Rejection Successful",
                'data' => null,

        ], 200);

            // Alert::alert('Cheque Rejected', ' ', 'success');
        }else{

            return response()->json([
                'responseCode' => "555",
                'message' => " Cheque Approval Failed",
                'data' => null,

        ], 200);

            // Alert::alert('Error Occured', ' ', 'error');
        }
        // return back();
    }


}
