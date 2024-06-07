<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "heading",
        "release_date",
        "text",
        "id_users",
        "id_category"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
