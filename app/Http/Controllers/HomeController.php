<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function index()
    {

        $pending_returns_count = DB::table('details')->where(['flag' => 'P'])->count();
        $approved_returns_count = DB::table('details')->where(['flag' => 'A'])->count();
        $rejected_returns_count = DB::table('details')->where(['flag' => 'R'])->count();

        return view('home', [
            'pending_returns_count' => $pending_returns_count,
            'approved_returns_count' => $approved_returns_count,
            'rejected_returns_count' => $rejected_returns_count,
        ]);
    }
}
