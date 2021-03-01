<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use DB;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // use AuthenticatesUsers;

    public function index()
    {

        return view('login.login');
    }


    public function post_login(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'username' =>  'required',
            'password' =>  'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // return $request;
        $username = $request->username;
        $password = $request->password;

        $user = User::where(['email' => $username, 'password' => $password])->first();


        if ($user != null) {
            Auth::login($user);
            // return Auth::user()->password;
            return redirect()->route('home');
        } else {
            return back()->with('error', 'incorrect credentials');
        }
    }


    public function logout()
    {

        Session::flush();
        // session()->forget('user');

        // if (!(session()->has('user'))) {
        //     return redirect()->route('login');
        // }

        return redirect()->route('login');
    }
}
