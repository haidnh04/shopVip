<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\CartService;
use App\Models\Customer;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $title = 'Danh sách đơn hàng';
        $customers = $this->cartService->getCustomer();
        return view('admin.carts.customer', compact('title', 'customers'));
    }

    public function show(Customer $customer)
    {
        $title = 'Chi tiết đơn hàng: ' . $customer->name;
        $carts = $this->cartService->getProductForCart($customer);
        return view('admin.carts.detail', compact('title', 'customer', 'carts'));
    }
}
