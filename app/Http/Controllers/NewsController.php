<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    //вывод статей
    public function newsOutput(Request $request)
    {
        $path = $request->path();
        $categoryName = str_replace('home/', '', $path);
        if ($categoryName == 'home')
        {
            $news = News::with('user', 'category')->paginate(10)->appends($request->all());

            return view('home', [
                'news' => $news
            ]);
        }

        $category = Category::where('name', $categoryName)->first();
        
        if ($category) 
        {
            $news = News::where('id_category', $category->id)
                ->with('user', 'category')
                ->paginate(10)
                ->appends($request->all());

            return view('home', [
                'news' => $news
            ]);
        } else {
            return abort(404, 'Такой категории не существует');
        }

    }  
}
