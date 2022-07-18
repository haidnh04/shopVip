<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\Product\ProductService;

class ProductUsersController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $title = $product->name;
        $products = $this->productService->more($id);

        return view('products.content', compact('title', 'products', 'product'));
    }
}
