<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use File;

class CKEditorController extends Controller
{
    //
    public function uploadPhoto(Request $request){
        if($request->hasFile('upload')){
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $trueName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('uploads'), $trueName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/'.$fileName); 
            $msg = 'Upload ảnh thành công'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
