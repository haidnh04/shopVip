<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    //Gọi ra tất cả dữ liệu cảu bảng products và lấy thêm danh mục của bảng menus
    public function getAll()
    {
        return Product::with('menu')->orderByDesc('id')->paginate(15);
    }

    //Check giá 
    protected function isValidPrice($request)
    {
        //Nếu giá sale cao hơn giá gốc thì báo lỗi
        if (
            $request->price != 0 && $request->price_sale != 0
            && $request->price_sale >= $request->price
        ) {
            //Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            //with('msg', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        //Nếu có giá sale và không có giá gốc thì báo
        if (
            $request->price = 0 && $request->price_sale != 0
        ) {
            //with('msg', 'Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    }


    //Câu lệnh thêm dữ liệu vào bảng products
    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) return false;
        $request->except('_token');
        //dd($request->all());
        try {

            //tương tự create bên menu. Đây dùng 1 hàm không cần thê từng phần tử như menu (cách khác)
            Product::create($request->all());

            //with('msg', 'Thêm sản phẩm thành công');
        } catch (\Exception $err) {
            //with('msg', 'Thêm sản phẩm không thành công');
            return false;
        }

        return true;
    }

    public function update($request, $product)
    {
        // $isValidPrice = $this->isValidPrice($request);
        // if ($isValidPrice == false) return false;

        try {
            $product->name = $request->name;
            $product->menu_id = $request->menu_id;
            $product->price = $request->price;
            $product->price_sale = $request->price_sale;
            $product->description = $request->description;
            $product->file = $request->file;
            $product->content = $request->content;
            $product->active = $request->active;
            $product->save();

            // dd($request->price);
        } catch (\Exception $err) {
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $id = $request->id;
        $product = Product::where('id', $id)->first();
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }
}
