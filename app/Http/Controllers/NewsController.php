<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    //вывод статей
    public function newsOutput(Request $request)
    {
        $query = News::query();
        $news = News::with('user', 'category')->paginate(10)->appends($request->all());
        // $news = $query->paginate(10)->appends($request->all());
        return view('home', [
            'news' => $news
        ]);
    }
}
