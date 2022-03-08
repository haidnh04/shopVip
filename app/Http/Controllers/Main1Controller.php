<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Models\Product;

class Main1Controller extends Controller
{

    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu, ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }

    // public function showSlide()
    // {
    //     $title = '';
    //     $sliders = $this->slider->show();
    //     return view('slider', compact('sliders', 'title'));
    // }

    public function index()
    {
        $title = 'Shop nước hoa ABC';
        $menus = $this->menu->show();
        $products = $this->product->get();
        return view('home', compact('title', 'menus', 'products'));
    }

    public function postSearch(Request $request)
    {
        $tuKhoa = $request->search;
        $title = 'Tìm kiếm sản phẩm: ';
        $searchs = Product::where('name', 'like', '%' . $tuKhoa . '%')->get();
        return view('search', compact('title', 'searchs', 'tuKhoa'));
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $products = $this->product->get();
        return view('products.list', compact('products', 'page'));

        // if (count($result) != 0) {
        //     $html = view('products.list', ['products' => $result])->render();

        //     return response()->json(['html' => $html]);
        // }

        // return response()->json(['html' => '']);
    }
}
