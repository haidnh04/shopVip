<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;

use Illuminate\Http\Request;

class Menu1Controller extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request, $id, $slug)
    {
        $menu = $this->menuService->getId($id);
        $products = $this->menuService->getProducts($menu, $request);
        $title = $menu->name;

        return view('menu', compact('title', 'menu', 'products'));
    }
}
