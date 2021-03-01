<?php

namespace App\Http\Controllers;

use App\Classes\AccessTokenGeneration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApproveUploadController extends Controller
{
    public function approve_uploaded_return($revisionId, $returnTypeId, $clearData, $upload_id)
    {
        // return $upload_id;

        if (!isset($revisionId) || !isset($returnTypeId) || !isset($clearData) || !isset($upload_id)) {
            // return "File does not exit";
            return back()->withErrors(['error' => 'File does not exit']);
        }

        // $request->excelUpload->storeAs('public/returns', $filename);

        // $filename = "upload-1611413196.xlsx";

        $upload = DB::table('tb_upload_returns')
        ->where(['id' => $upload_id, 'flag' => 'N'])
        ->first();

        // return json_encode($upload);

        if(is_null($upload)){
            return back()->withErrors(['error' => 'File does not exit']);
        }

        $file = "http://localhost/ndk_orass_api/public/uploads/returns/$upload->filename";
    //    return  $file;
        $filename = $upload->filename;
        // return $filename;

        $tokenization = new AccessTokenGeneration();
        $access_token = $tokenization->generationToken();
        // return $access_token;



        try {
            $file = fopen($file, 'r');
            $response = Http::attach(
                'file',
                $file,
                $filename
            )->withToken($access_token)
                ->post("https://orassvas.bog.gov.gh:7002/v1/returns/$revisionId/submit/$returnTypeId/upload/$clearData");


            if ($response->ok()) {


                $insert_query = DB::table('tb_upload_returns')
                ->where(['id' => $upload_id])
                    ->update([
                        'flag' => 'A'
                    ]);


                // $res = json_decode($response->body());
                // $returns = json_decode($response->body());
                // return $returns;



                return redirect()->route('pending-uploaded-returns')->with('success','Upload to ORAS successful');
            } else {
                // return 'hjjjjj';
                return view('error', ['message' => "API SERVER CONNECTION ERROR  "]);
                // return "Error";
            }
        } catch (\Exception $e) {
            // return  $e->getMessage();
            return view('error', ['message' => $e->getMessage()]);
        }
    }


    public function reject_uploaded_return($returnTypeId, $id)
    {
        // return $filename;

        if (!isset($returnTypeId)  || !isset($id)) {
            return back()->withErrors(['error' => 'File does not exit']);
        }

        $reject_query = DB::table('tb_upload_returns')
            ->where([
                'id' => $id
            ])
            ->update(['flag' => 'R']);
        return back()->with('success', "Return type id #($returnTypeId)  has been rejected");
    }
}
