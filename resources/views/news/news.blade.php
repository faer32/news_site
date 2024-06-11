@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>{{ $article->heading }}</h1>
        <p><strong>Дата выхода:</strong> {{ $article->release_date }}</p>
        <p><strong>Автор:</strong> {{ $article->user->lastName }} {{ $article->user->name }} {{ $article->user->patronymic }}</p>
        <p><strong>Категории:</strong> 
            @foreach($article->categories as $category)
                {{ $category->name }}@if(!$loop->last), @endif
            @endforeach
        </p>
        <div>
            <p>{{ $article->text }}</p>
        </div>
    </div>
@endsection