<?php

namespace App\Models;

use App\Models\NNew;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'new_id',
        'active'
    ];

    public function news()
    {
        return $this->belongsTo(NNew::class, 'new_id', 'id');
    }
}
