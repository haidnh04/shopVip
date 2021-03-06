<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Services\Product\CartService;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Customer\CreateFormCustomerRequest;

class CartController extends Controller
{

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }


    public function index(Request $request)
    {
        $result = $this->cartService->create($request);

        if ($result == false) {
            return redirect()->back();
        }

        return redirect('/carts');
    }

    public function show()
    {
        $title = 'Giỏ hàng của bạn';
        $products = $this->cartService->getProduct();
        $carts = Session::get('carts');
        return view('carts.list', compact('title', 'products', 'carts'));
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);
        return redirect('carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);
        return redirect('carts');
    }

    public function addCart(CreateFormCustomerRequest $request)
    {
        $this->cartService->addCart($request);
        return redirect()->back();
    }
}
