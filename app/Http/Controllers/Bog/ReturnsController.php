<?php

namespace App\Http\Controllers\Bog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    function index(Request $request)
    {
        // return $request;
        return [
            "uniqueMessageIdentifier" => "101011",
            "responseCode" => "01",
            "responseRemark" => "Success"
        ];
    }
}
