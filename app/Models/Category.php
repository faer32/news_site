<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
       "name",
       "id_cat"
    ];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'id_cat');
    }

    public function childCategory()
    {
        return $this->hasMany(Category::class, 'id_cat');
    }
}
