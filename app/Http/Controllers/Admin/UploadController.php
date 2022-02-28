<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\UploadService;
use Facade\FlareClient\Http\Response;

class UploadController extends Controller
{
    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    //phần lấy ảnh (truyền qua bên UploadService thao tác
    //có cả json ở main.js (gắn vào footer), token gắn ở header)
    public function store(Request $request)
    {
        $url = $this->upload->store($request);
        if ($url != false) {
            return response()->json([
                'error' => false,
                'url' => $url
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
