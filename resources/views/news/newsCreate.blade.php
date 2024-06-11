@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    @php
                        $url = url()->current();
                        $lastSegment = basename($url);
                    @endphp
                    @if($lastSegment === 'create')
                        <h3>Создать новость</h3>
                    @elseif($lastSegment === 'edit')
                        <h3>Редактировать новость</h3>
                    @endif
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ isset($news) ? route('profile.update', $news->id) : route('profile.store') }}" method="POST">
                        @csrf
                        @if (isset($news))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="heading">Заголовок</label>
                            <input type="text" name="heading" class="form-control" id="heading" value="{{ $news->heading ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Содержание</label>
                            <textarea name="text" class="form-control" id="text" rows="5" required>{{ $news->text ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="release_date">Дата релиза</label>
                            <input type="date" name="release_date" class="form-control" id="release_date" value="{{ $news->release_date ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Категория</label>
                            <select name="id_category" class="form-control" id="id_category" required>                               
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('id_category', $news->id_category ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-primary mt-3">
                            @if($lastSegment === 'create')
                                Создать новость
                            @elseif($lastSegment === 'edit')
                                Редактировать новость
                        @endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
