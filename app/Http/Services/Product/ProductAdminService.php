<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

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
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        //Nếu có giá sale và không có giá gốc thì báo
        // if (
        //     $request->price = 0 && $request->price_sale != 0
        // ) {
        //     Session::flash('error', 'Vui lòng nhập giá gốc');
        //     return false;
        // }

        // if (
        //     $request->price < 0 || $request->price_sale < 0 || $request->amount < 0
        // ) {
        //     Session::flash('error', 'Vui lòng nhập không nhập số âm');
        //     return false;
        // }

        return true;
    }


    //Câu lệnh thêm dữ liệu vào bảng products
    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) return false;
        $request->except('_token');

        try {
            //tương tự create bên menu. Đây dùng 1 hàm không cần thê từng phần tử như menu (cách khác)
            Product::create($request->all());

            Session::flash('success', 'Thêm sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi trong quá trình thêm sản phẩm, bạn thử lại sau');
            return false;
        }

        return true;
    }

    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) return false;

        try {
            $product->name = $request->name;
            $product->menu_id = $request->menu_id;
            $product->price = $request->price;
            $product->price_sale = $request->price_sale;
            $product->description = $request->description;
            $product->file = $request->file;
            $product->amount = $request->amount;
            $product->content = $request->content;
            $product->weight = $request->weight;
            $product->dimensions = $request->dimensions;
            $product->materials = $request->materials;
            $product->color = $request->color;
            $product->size = $request->size;
            $product->active = $request->active;
            $product->save();
            Session::flash('success', 'Cập nhật sản phẩm thành công');
            // dd($request->price);
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi trong quá trình cập nhật sản phẩm, bạn thử lại sau');
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
