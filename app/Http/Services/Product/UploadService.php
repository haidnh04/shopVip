<?php

namespace App\Http\Services\Product;

use App\Models\Product;


class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                //Lấy tên file ra
                $name = $request->file('file')->getClientOriginalName();

                //lấy đường dẫn \uploads\2022\02\21
                $pathFull = 'uploads/' . date("Y/m/d");

                //Lưu vào file folder có tên chuẩn (storage\app\public\uploads\2022\02\21\ten_file)
                $path = $request->file('file')->storeAs(
                    'public/' . $pathFull,
                    $name
                );

                //Trả về đường dẫn chuẩn của ảnh (storage\app\public\uploads\2022\02\21\ten_file)
                return '/storage/' . $pathFull . '/' . $name;

            } catch (\Exception $err) {
                return false;
            }
        }
    }
}
