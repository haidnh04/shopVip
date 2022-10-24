<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $productAdminService;

    public function __construct(ProductAdminService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }

    public function index(Request $request)
    {
        $title = "Danh sách sản phẩm";
        $products = $this->productAdminService->getAllWithSearch($request);
        $menus = $this->productAdminService->getMenu();
        return view('admin.products.list', compact('title', 'products', 'menus'));
    }

    public function changeActive(Request $request)
    {
        $user = Product::find($request->product_id);
        $user->active = $request->active;
        $user->save();
        return redirect()->route('listProduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm sản phẩm";
        $menus = $this->productAdminService->getMenu();
        return view('admin.products.add', compact('title', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $this->productAdminService->insert($request);
        return redirect()->route('listProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Form để sửa các danh mục (thao tác ở dưới luôn) 
    //-> gần như index truyền thêm id để lấy đúng sp theo id đó
    public function show(Product $product)
    {
        $title = 'Cập nhật sản phẩm: ' . $product->name;
        $products = $this->productAdminService->getProduct();
        $menus = $this->productAdminService->getMenu();
        return view('admin.products.edit', compact('title', 'product', 'products', 'menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $this->productAdminService->update($request, $product);

        return redirect()->route('listProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Xóa các danh mục (truyền qua bên ProductAdminService thao tác
    //có cả json ở main.js (gắn vào footer), token gắn ở header)
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->productAdminService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
