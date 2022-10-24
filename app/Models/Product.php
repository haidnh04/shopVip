<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'file',
        'menu_id',
        'price',
        'price_sale',
        'amount',
        'weight',
        'dimensions',
        'materials',
        'color',
        'size',
        'active',
        'file_num2',
        'file_num3',
        'file_num4',
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}
