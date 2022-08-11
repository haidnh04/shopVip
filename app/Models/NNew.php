<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\KindNew;
use App\Models\NewCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NNew extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'summary',
        'content',
        'file',
        'hightlight',
        'view',
        'kind_id',
        'active',
        'category_id',
    ];

    public function kindNews()
    {
        return $this->belongsTo(KindNew::class, 'kind_id', 'id');
    }

    public function categoryNews()
    {
        return $this->belongsTo(NewCategory::class, 'category_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'new_id', 'id');
    }
}
