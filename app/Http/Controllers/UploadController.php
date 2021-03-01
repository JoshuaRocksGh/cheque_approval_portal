<?php

namespace App\Http\Controllers;

use App\Classes\AccessTokenGeneration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{



    function index(Request $request)
    {

        // return  Auth::user();


        // return $request;
        $revisionId = $request->query('revisionId');
        $returnTypeId = $request->query('returnTypeId');
        $return_id = $request->query('return_id');
        $return_name = $request->query('return_name');
        $return_reference = $request->query('return_reference');
        $return_endDate = $request->query('return_endDate');
        $return_status = $request->query('return_status');

        // return $return_id;

        return view('returns.upload', [
            'revisionId' => $revisionId,
            'returnTypeId' => $returnTypeId,
            'return_id' => $return_id,
            'return_name' => $return_name,
            'return_reference' => $return_reference,
            'return_endDate' => $return_endDate,
            'return_status' => $return_status,
        ]);
    }

    function uploaded_returns()
    {
        $uploaded_returns = DB::table('details')->where(['flag' => 'A'])->orderByDesc('id')->get();

        // return $uploaded_returns;

        return view('returns.uploaded_returns', ['uploaded_returns' => $uploaded_returns]);
    }

    // function download_return($filename)
    // {

    //     $filename = $filename;

    //     return response()->download(public_path('uploads/returns/' . $filename));
    // }



    function post_upload(Request $request )
    {

        // return $request;

        $validator = Validator::make($request->all(), [
            'clearData' =>  'required',
            'returnTypeId' =>  'required',
            'revisionId' =>  'required',
            'return_id' =>  'required',
            'return_name' =>  'required',
            'return_reference' =>  'required',
            'return_endDate' =>  'required',
            'return_status' =>  'required',
            'file' =>  'required | file | mimes:xlsx',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }



        $revisionId = $request->revisionId;
        $returnTypeId = $request->returnTypeId;
        $clearData = $request->clearData;
        $return_id = $request->return_id;
        $return_name = $request->return_name;
        $return_reference = $request->return_reference;
        $return_endDate = $request->return_endDate;
        $return_status = $request->return_status;

        $file = $request->file('file');

        // return $file;


        // GET FILE NAME AND EXTENTION
        $extension = $request->file->getClientOriginalExtension();
        // return $extension;
        $filename = 'upload-' . time() . "." . $extension;
        // return $filename;


        // $request->file->storeAs('public/returns', $filename);
         $request->file->move(public_path('uploads/returns'), $filename);


        $file = "http://localhost/BOG/public/uploads/returns/" . $filename;
        // return $file;

        $insert_query = DB::table('details')
        ->insert([
            'revision_id' => $revisionId,
            'return_type_id' => $returnTypeId,
            'clear_data' => $clearData,
            'filename' => $filename,
            'return_id' => $return_id,
            'return_name' => $return_name,
            'return_reference' => $return_reference,
            'return_endDate' => $return_endDate,
            'return_status' => $return_status
        ]);

        if ($insert_query) {
            return redirect()->route('uploaded-returns')->with('success', 'Uploaded successful and pending approval.');
        } else {
            return back()->withErrors(['error' => 'Database query error']);
        }


        /*
        $tokenization = new AccessTokenGeneration();
        $access_token = $tokenization->generationToken();

        $file = fopen($file, 'r');


        $response = Http::attach(
            'file',
            $file,
            $filename
        )->withToken($access_token)
        ->post("https://orassvas.bog.gov.gh:7002/v1/returns/$revisionId/submit/$returnTypeId/upload/$clearData");


        if ($response->ok()) {


            $insert_query = DB::table('tb_upload_returns')
                ->insert([
                    'revision_id' => $revisionId,
                    'return_type_id' => $returnTypeId,
                    'clear_data' => $clearData,
                    'filename' => $filename
                ]);


            // $res = json_decode($response->body());
            // $returns = json_decode($response->body());
            // return $returns;

            return redirect()->route('uploaded-returns');
        } else {
           return back()->with('error', 'API SERVER ERROR');
            // return "Error";
        }

        */
    }


    public function approved_uploaded_returns()
    {

        $uploaded_returns = DB::table('tb_upload_returns')->where(['flag' => 'A'])->orderByDesc('id')->get();
        return view('returns.approved_uploaded_returns', ['uploaded_returns' =>$uploaded_returns]);
    }


    public function rejected_uploaded_returns()
    {

        $uploaded_returns = DB::table('tb_upload_returns')->where(['flag' => 'R'])->orderByDesc('id')->get();
        return view('returns.rejected_uploaded_returns', ['uploaded_returns' =>$uploaded_returns]);
    }


    public function pending_uploaded_returns()
    {

        $uploaded_returns = DB::table('details')->where(['flag' => 'P'])->orderByDesc('id')->get();

        // return $uploaded_returns;

        // $uploaded_returns = [
        //         [
        //             'revision_id' => '290923',
        //             'return_type_id' => '29u39029',
        //             'clear_data' => 'true',
        //             'filename' => 'filename',
        //             'created_at' => '23-12-2020',
        //             'flag' => 'N'
        //         ],
        //         [
        //             'revision_id' => '290923',
        //             'return_type_id' => '29u39029',
        //             'clear_data' => 'true',
        //             'filename' => 'filename',
        //             'created_at' => '23-12-2020',
        //             'flag' => 'N'
        //         ],
        //         [
        //             'revision_id' => '290923',
        //             'return_type_id' => '29u39029',
        //             'clear_data' => 'true',
        //             'filename' => 'filename',
        //             'created_at' => '23-12-2020',
        //             'flag' => 'N'
        //         ],
        //         [
        //             'revision_id' => '290923',
        //             'return_type_id' => '29u39029',
        //             'clear_data' => 'true',
        //             'filename' => 'filename',
        //             'created_at' => '23-12-2020',
        //             'flag' => 'N'
        //         ],
        //         [
        //             'revision_id' => '290923',
        //             'return_type_id' => '29u39029',
        //             'clear_data' => 'true',
        //             'filename' => 'filename',
        //             'created_at' => '23-12-2020',
        //             'flag' => 'R'
        //         ],
        //         [
        //             'revision_id' => '290923',
        //             'return_type_id' => '29u39029',
        //             'clear_data' => 'true',
        //             'filename' => 'filename',
        //             'created_at' => '23-12-2020',
        //             'flag' => 'Y'
        //         ],
        //         [
        //             'revision_id' => '290923',
        //             'return_type_id' => '29u39029',
        //             'clear_data' => 'true',
        //             'filename' => 'filename',
        //             'created_at' => '23-12-2020',
        //             'flag' => 'N'
        //         ]
        //     ];
            // return json_encode($uploaded_returns);

            // return Auth::user();

        return view('returns.pending_uploaded_returns', ['uploaded_returns' =>$uploaded_returns]);

    }

}
