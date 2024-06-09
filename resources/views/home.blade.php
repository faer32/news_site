@extends('layouts.main')

@section('title-block')

@section('content')
<!-- Контент -->
<div class="container">
    <div class="row mt-1">
        <div class="col-lg-2">
            <!-- -->
        </div>
        <div class="col-lg-10">
            <!-- Контент на странице -->
            <h1 class="mt-5 pt-5"><strong>Новостной сайт</strong></h1>
        </div>
        <ul>
            @foreach($news as $article)
            <li>
                <h2>{{ $article->heading }}</h2>
                <p><strong>Дата публикации:</strong> {{ $article->release_date }}</p>
                <p>{{ $article->text }}</p>
                <p>Автор: {{ $article->user->lastName }} {{ $article->user->name }} {{ $article->user->patronymic }}</p>
                <p>Категория: {{ $article->category->name }}</p>
            </li>
            @endforeach
        </ul>
        <div class="">
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection