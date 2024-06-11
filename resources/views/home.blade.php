@extends('layouts.main')

@section('title-block')

@section('content')
<!-- Контент -->
<div class="container">
    <div class="row mt-1">
        <div class="col-lg-10">
            <h1 class="mt-5 pt-5"><strong>Новостной сайт</strong></h1>
            <br>
            <br>
        </div>
        <ul>
            @foreach($news as $article)
            <li class="homeli">
                <h2>{{ $article->heading }}</h2>
                <p><strong>Дата публикации:</strong> {{ $article->release_date }}</p>
                <p>{{ \Illuminate\Support\Str::limit($article->text, 100, $end='...') }}</p>
                <p><strong>Автор:</strong> {{ $article->user->lastName }} {{ $article->user->name }} {{ $article->user->patronymic }}</p>
                <p><strong>Категории:</strong> 
                    @foreach($article->categories as $category)
                        {{ $category->name }}@if (!$loop->last), @endif
                    @endforeach
                </p>
                <a href="{{ route('news.news', $article->id) }}">Читать полностью</a>               
            </li>
            <br>
            @endforeach
        </ul>
        <div class="">
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection