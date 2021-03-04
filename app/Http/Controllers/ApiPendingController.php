<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiPendingController extends Controller
{
    //


    public function pending_uploaded_cheques()
    {

        $uploaded_cheque = DB::table('details')->where(['flag' => 'P'])->orderByDesc('id')->get();

        return response()->json([
            'responseCode' => "000",
            'message' => "Successful Pending Cheque Display",
            'data' => $uploaded_cheque

        ], 200);

        // return view('returns.pending_uploaded_returns', ['uploaded_returns' =>$uploaded_returns]);

    }

    // return response()->json([
    //     'responseCode' => "000",
    //     'message' => " Successful Displaying Cheque List",
    //     'data' => $query,

    // ], 200);


}
