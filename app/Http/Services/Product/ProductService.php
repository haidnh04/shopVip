<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Log;


class ProductService
{

    // const LIMIT = 16;
    public function get()
    {
        $productShows = Product::select('id', 'name', 'price', 'price_sale', 'file')
            ->orderByDesc('id')
            // ->when($page != null, function ($query) use ($page) {
            //     $query->offset($page * self::LIMIT);
            // })
            // ->limit(self::LIMIT)
            ->where('active', 1)
            ->get();
        return $productShows;
    }

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }

    public function more($id)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'file')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}
