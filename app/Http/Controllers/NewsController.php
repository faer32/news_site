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

        //вывод всех статей
        if ($categoryName == 'home')
        {
            $news = News::with('user', 'categories')->paginate(10)->appends($request->all());
            // dd($news);
            return view('home', [
                'news' => $news
            ]);
        }

        $category = Category::where('name', $categoryName)->first();
        
        //вывод статей по конкретной категории
        if ($category) 
        {
            $news = News::whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category->id);
            })
                ->with('user', 'categories')
                ->paginate(5)
                ->appends($request->all());

            return view('home', [
                'news' => $news
            ]);
        } else {
            return abort(404, 'Такой категории не существует');
        }

    }
    // вывод страницы статьи
    public function show($id)
    {
        $article = News::with(['user', 'categories'])->findOrFail($id);
        return view('news.news', compact('article'));
    }
}
