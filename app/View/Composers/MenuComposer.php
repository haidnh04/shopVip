<?php

namespace App\View\Composers;

use Illuminate\View\View;
use  App\Models\Menu;
use Illuminate\Support\Facades\Log;

class MenuComposer
{

    protected $users;


    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $menus = Menu::select('id', 'name', 'parent_id', 'img')->where('active', 1)->orderByDesc('id')->get();
        $view->with('menus', $menus);
    }
}
