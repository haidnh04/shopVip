<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'active',
        'img'
    ];

    public function products()
    {
        //1 danh mục có nhiều sản phẩm (model product, 'id của khóa ngoại', 'id menu')
        return $this->hasMany(Product::class, 'menu_id', 'id');
    }
}
