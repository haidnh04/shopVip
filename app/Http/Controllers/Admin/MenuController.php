<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormMenuRequest;
use App\Http\Requests\Menu\UpdateFormMenuRequest;
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
    public function store(CreateFormMenuRequest $request)
    {
        $this->menuService->create($request);
        return redirect()->route('listMenu');
    }

    // Danh sách các danh mục (truyền qua bên MenuService thao tác)
    public function index()
    {
        $title = "Danh sách danh mục";
        $menus = $this->menuService->getAll();
        $menuParent = $this->menuService->getParent();
        return view('admin.menus.list', compact('title', 'menus', 'menuParent'));
    }

    //Form để sửa các danh mục (thao tác ở dưới luôn) 
    //-> gần như index truyền thêm id để lấy đúng sp theo id đó
    public function show(Menu $menu)
    {
        $title = 'Cập nhật danh mục: ' . $menu->name;
        $menus = $this->menuService->getParent();
        return view('admin.menus.edit', compact('title', 'menu', 'menus'));
    }

    //Thực hiện sửa danh mục (truyền qua bên MenuService thao tác)
    public function update(UpdateFormMenuRequest $request, Menu $menu)
    {
        $this->menuService->update($request, $menu);
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
