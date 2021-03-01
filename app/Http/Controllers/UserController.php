<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // use AuthenticatesUsers;

    public function index()
    {

        return view('login.add_user');
    }




        public function post_user(Request $request)
    {

         $user = User::create([
            'name'=>$request->input('name'), 
            'email'=>$request->input('email'), 
            'password'=> $request->password, 
        ]);

         return back()->with('success', 'User Created successfully');
    }


    public function update(Request $request, $id){

        $user = User::find($id);
        // return $user;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if (!empty($request->input('password'))) {$user->password = $request->password;}
        // if(!empty($request->input('password'))){$user->password = $request->input('password');}
        $user->user_role = $request->input('user_role');
        $user->save();

        // Toastr::success('User Updated Successfully', 'User');
        return back()->with('success', 'User Updated successfully');
    }
    

    public function view_users()
    {

        $users =  User::all();

        return view('login.view_users', ['users' => $users]);
    }

        public function destroy($id)
    {
            
        $user = User::find($id);
        // return $user;
        $user->delete();

        return redirect()->to('/view_users'); 
    }



}
