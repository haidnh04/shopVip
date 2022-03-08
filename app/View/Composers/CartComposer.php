<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use App\Models\Product;

class CartComposer
{

    protected $users;


    public function __construct()
    {
    }

    public function compose(View $view)
    {
        // Session::forget('carts');
        $carts = Session::get('carts');
        //Chưa có sản phẩm thì trả về rỗng
        // if (is_null($carts)) return [];
        if (is_null($carts)) {
            $products = [];
            return $products;
        }
        
        //Có sản phẩm thì trả ra sản phẩm
        $productID = array_keys($carts);
        $products =  Product::select('id', 'name', 'price', 'price_sale', 'file')
            ->where('active', 1)
            ->whereIn('id', $productID)
            ->get();

        $view->with('products', $products);
    }
}
