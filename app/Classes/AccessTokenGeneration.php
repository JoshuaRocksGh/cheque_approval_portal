<?php

namespace App\Classes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AccessTokenGeneration
{
    public function generationToken()
    {


        // GET the AUTH
        $username =  Auth::user()->email;
        $password =  Auth::user()->password;// wnt to get the password like so Ab123456. and not the hash

        $api_user = DB::table('tb_bog_oras_api_user')->select('api_username', 'api_password')->first();


        try {
            $response = Http::asForm()->post('https://orassvas.bog.gov.gh:7002/oauth2/token', [
                'grant_type' => 'password',
                'username' =>  $api_user->api_username,
                'password' => $api_user->api_password
                // 'username' => 'bestpoint_api@bestpointgh.com',
                // 'password' => 'Ab123456.'
            ]);

            if ($response->ok()) {
                // return $response->body();
                $res = json_decode($response->body());

                // Decomposing into various variables
                $access_token =  $res->access_token;
                $token_type =  $res->token_type;

                return $access_token;
            }else{
                return view('error', ['message' => "API SERVER CONNECTION ERROR  "]);
            }
        } catch (\Exception $e) {
            // return $e->getMessage();
            return view('error', ['message' => $e->getMessage()]);
        }

    }
}
