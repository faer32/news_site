<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;

    protected $table = 'news_category';

    protected $fillable = [
        'news_id',
        'category_id',
    ];

    // определение связи с News
    public function news()
    {
        return $this->belongsTo(News::class);
    }

    // определение связи с Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
