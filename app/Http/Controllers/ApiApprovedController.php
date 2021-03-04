<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiApprovedController extends Controller
{
    //


    function index()
    {
        $query = DB::table('details')->where(['flag' => 'A'])->get();

        return response()->json([
            'responseCode' => "000",
            'message' => " Successful Displaying Cheque List",
            'data' => $query,

        ], 200);
        // return $query;
        // return view('returns.approved_cheque', ['uploaded_returns' =>$query]);
    }


    function approved(Request $req, $cheque_id)
    {
        // return $cheque_id;
        $approved_query = DB::table('details')->where(['id' => $cheque_id])->update(['flag' => 'A']);
        if ($approved_query) {

            return response()->json([
                'responseCode' => "000",
                'message' => " Cheque Approval Successful",
                'data' => null,

            ], 200);
            // Alert::alert('Cheque Approved', ' ', 'success');
        } else {
            // Alert::alert('Error Occured', ' ', 'error');

            return response()->json([
                'responseCode' => "555",
                'message' => " Cheque Approval Failed",
                'data' => null,

            ], 200);
        }
        // return back();
    }
}
