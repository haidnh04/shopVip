<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KindNew;

class AjaxController extends Controller
{
    public function getKind($category_id)
    {
        $loaitin = KindNew::where('category_id', $category_id)->get();
        foreach ($loaitin as $key => $lt) {
            echo "<option value='" . $lt->id . "'>" . $lt->name . "</option>";
        }
    }
}
