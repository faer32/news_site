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

    //возвращает родительскую категорию
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'id_cat');
    }
    //возвращает дочерную категорию
    public function childCategory()
    {
        return $this->hasMany(Category::class, 'id_cat');
    }
    //определяет отношение между категориями и новостями
    public function news()
    {
        return $this->belongsToMany(News::class, 'news_category');
    }

}
