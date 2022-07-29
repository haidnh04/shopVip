<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->where('active', 1)->get();
    }

    public function show()
    {
        return Menu::select('id', 'name')
            ->orderByDesc('id')
            ->where('parent_id', 0)
            ->where('active', 1)
            ->get();
    }

    public function getAll()
    {
        return Menu::orderByDesc('id')->paginate(10);
    }

    public function create($request)
    {
        Log::debug($request->all());
        try {
            Menu::create([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'description' => $request->description,
                'content' => $request->content,
                'active' => $request->active,
                'img' => $request->img,
                //'slug' => Str::slug($request->name, '-'),
            ]);
            Session::flash('success', 'Thêm danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi trong quá trình thêm danh mục, bạn thử lại sau');
        }
    }

    public function update($request, $menu)
    {
        try {
            if ($request->parent_id != $menu->id) {
                $menu->parent_id = $request->parent_id;
            }
            $menu->name = $request->name;
            $menu->description = $request->description;
            $menu->content = $request->content;
            $menu->active = $request->active;
            $menu->img = $request->img;
            $menu->save();

            // return true;
            Session::flash('success', 'Cập nhật danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi trong quá trình cập nhât danh mục, bạn thử lại sau');
        }
    }

    public function destroy($request)
    {
        $id = $request->id;
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function getId($id)
    {
        // đưa id vào kiểm tra nếu có thì ok không thì báo lỗi 404 không tìm thấy
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProducts($menu, $request)
    {
        $query = $menu->products()
            ->select('id', 'name', 'price', 'price_sale', 'file')
            ->where('active', 1);

        if ($request->price) {
            $query->orderBy('price', $request->price);
        }

        return $query->orderByDesc('id')
            ->paginate(12)->withQueryString();
    }
}
