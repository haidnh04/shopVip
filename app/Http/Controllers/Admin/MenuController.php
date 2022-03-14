<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\JsonResponse;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    //Form để thêm danh mục (truyền qua bên MenuService thao tác)
    public function create()
    {
        $title = "Thêm danh mục mới";
        $menus = $this->menuService->getParent();
        return view('admin.menus.add', compact('title', 'menus'));
    }

    //Thực hiện thêm danh mục (truyền qua bên MenuService thao tác)
    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);
        return redirect()->route('createMenu');
    }

    // Danh sách các danh mục (truyền qua bên MenuService thao tác)
    public function index()
    {
        $title = "Danh sách danh mục";
        $menus = $this->menuService->getAll();
        return view('admin.menus.list', compact('title', 'menus'));
    }

    //Form để sửa các danh mục (thao tác ở dưới luôn) 
    //-> gần như index truyền thêm id để lấy đúng sp theo id đó
    public function show(Menu $menu)
    {
        $title = 'Cập nhật danh mục: ' . $menu->name;
        $menus = $this->menuService->getAll();
        return view('admin.menus.edit', compact('title', 'menu', 'menus'));
    }

    //Thực hiện sửa danh mục (truyền qua bên MenuService thao tác)
    public function update(Menu $menu, Request $request)
    {
        $abc = $this->menuService->update($request, $menu);
        // dd($abc);
        return redirect()->route('listMenu');
    }

    //Xóa các danh mục (truyền qua bên MenuService thao tác
    //có cả json ở main.js (gắn vào footer), token gắn ở header)

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
