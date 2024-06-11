<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        "heading",
        "release_date",
        "text",
        "id_users",
        "id_category"
    ];

    // определяет отношение с автором
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    // определяет отношение с категориями
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_category');
    }
}
