<?php

namespace App\Models;

use App\Models\NNew;
use App\Models\NewCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KindNew extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'active'
    ];


    public function categoryNews()
    {
        return $this->belongsTo(NewCategory::class, 'category_id', 'id');
    }

    public function news()
    {
        return $this->hasMany(NNew::class, 'kind_id', 'id');
    }
}
