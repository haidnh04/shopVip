<?php

namespace App\Models;

use App\Models\KindNew;
use App\Models\NNew;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'active'
    ];

    public function kindNews()
    {
        //1 danh mục có nhiều loại tin (model kindnew, 'id của khóa ngoại', 'id newCategory')
        return $this->hasMany(KindNew::class, 'category_id', 'id');
    }

    public function news()
    {
        return $this->hasManyThrough(NNew::class, KindNew::class, 'category_id', 'kind_id', 'id');
    }
}
