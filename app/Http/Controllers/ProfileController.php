<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\NewsFormRequest;

class ProfileController extends Controller
{
    //профиль
    public function index()
    {
        $user = Auth::user();
        $news = $user->news;
        return view('user.profile', compact('user','news'));
    }

    //переход на страницу для создания статьи
    public function create()
    {
        $categories = Category::all();
        return view('news.newsCreate', compact('categories'));
    }

    //процесс создания статьи
    public function store(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required|string',
            'text' => 'required|string',
            'release_date' => 'required|date',
            'id_users' => 'required|exists:users,id',
        ]);
        $news = News::create($data);
        $news->categories()->attach($request->id_category);
        return redirect('profile');
    }


    public function show(string $id)
    {
        //
    }

    //переход на страницу для редактирования статьи
    public function edit(string $id)
    {
        $categories = Category::all();
        $news = News::findOrFail($id);
        return view('news.newsCreate', [
            "news" => $news,
            "categories" => $categories,
        ]);
    }

    //процесс обноваления статьи
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'heading' => 'required|string',
            'text' => 'required|string',
            'release_date' => 'required|date',
        ]);
        $news = News::findOrFail($id);
        $news->update($validatedData);
        $news->categories()->sync($request->id_category);
        
        return redirect('profile');
    }

    //удаление статьи
    public function destroy(string $id)
    {
        News::destroy($id);
        return redirect('profile');
    }
}
