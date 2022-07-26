<?php

namespace App\Http\Services\Product;

use App\Models\Product;


class UploadService
{
    public function store($request)
    {
        //gõ php artisan storage:link để ra link ảnh
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
        if ($request->hasFile('file_num2')) {
            try {
                //Lấy tên file ra
                $name = $request->file('file_num2')->getClientOriginalName();

                //lấy đường dẫn \uploads\2022\02\21
                $pathFull = 'uploads/' . date("Y/m/d");

                //Lưu vào file folder có tên chuẩn (storage\app\public\uploads\2022\02\21\ten_file)
                $path = $request->file('file_num2')->storeAs(
                    'public/' . $pathFull,
                    $name
                );

                //Trả về đường dẫn chuẩn của ảnh (storage\app\public\uploads\2022\02\21\ten_file)
                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $err) {
                return false;
            }
        }
        if ($request->hasFile('file_num3')) {
            try {
                //Lấy tên file ra
                $name = $request->file('file_num3')->getClientOriginalName();

                //lấy đường dẫn \uploads\2022\02\21
                $pathFull = 'uploads/' . date("Y/m/d");

                //Lưu vào file folder có tên chuẩn (storage\app\public\uploads\2022\02\21\ten_file)
                $path = $request->file('file_num3')->storeAs(
                    'public/' . $pathFull,
                    $name
                );

                //Trả về đường dẫn chuẩn của ảnh (storage\app\public\uploads\2022\02\21\ten_file)
                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $err) {
                return false;
            }
        }
        if ($request->hasFile('file_num4')) {
            try {
                //Lấy tên file ra
                $name = $request->file('file_num4')->getClientOriginalName();

                //lấy đường dẫn \uploads\2022\02\21
                $pathFull = 'uploads/' . date("Y/m/d");

                //Lưu vào file folder có tên chuẩn (storage\app\public\uploads\2022\02\21\ten_file)
                $path = $request->file('file_num4')->storeAs(
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
