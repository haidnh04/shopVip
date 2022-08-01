<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function ckUpload(Request $request)
    {
        $file = $request->upload;
        $filename = $file->getClientOriginalName();
        $new_name = time() . $filename;
        $dir = "storage/files/";
        $file->move($dir, $new_name);
        $url = asset('storage/files/' . $new_name);
        $CkeditorFuncNum = $request->input('CKEditorFuncNum');
        $status = "<script>window.parent.CKEDITOR.tools.callFunction('$CkeditorFuncNum', '$url', 'File upload successs')</script>";
        echo $status;
    }
}
