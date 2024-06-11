@extends('layouts.main')

@section('content') 
<!-- Контент -->
<div class="container">
    <div class="row mt-1">
        <div class="col-lg-10">
            <!-- Контент на странице -->
            <div class="row">
                <div class="container mt-5">
                    <div class="row">
                        <!-- Профиль с данными пользователя -->
                        <div class="col-md-5 mx-auto">
                            <div class="bg-white p-4 mb-4 mx-2 rounded custom-shadow">
                                <h3 class="text-center mb-4">Профиль пользователя</h3>
                                <div class="row">
                                    <div class="col-md-12 mb-3 text-center">
                                        <img src="storage/images/Not found image.png" alt="Аватар пользователя" class="img-fluid rounded-circle" style="max-width: 150px;">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"><strong>Имя:</strong> {{$user->name}}</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"><strong>Фамилия:</strong> {{$user->lastName}}</label>
                                    </div>
                                    {{-- <div class="col-md-12 mb-3">
                                        <label class="form-label"><strong>Отчество:</strong> {{$user->patronymic}}</label>
                                    </div> --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"><strong>Email:</strong> {{$user->email}}</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Подтверждение почты</label>
                                        <input type="checkbox" class="form-check-input" id="activate" disabled 
                                        @if($user->email_verified_at) checked @endif>
                                    </div>
                                    @if(!$user->email_verified_at)
                                        <div class="col-md-12 mb-3 text-center">
                                            @auth
                                            <a href="{{ route('verification.notice') }}" class="btn btn-primary">Подтвердить почту</a>
                                            @endauth
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>  
                        <!-- Управление статьями -->
                        <div class="col-md-12">
                            <h2>Управление статьями:</h2>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Заголовок</th>
                                            <th>Содержание</th>
                                            <th>Дата релиза</th>
                                            <th>Категория</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $n)
                                            <tr>
                                                <td>{{$n->id}}</td>
                                                <td>{{$n->heading}}</td>
                                                <td>{{$n->text}}</td>
                                                <td>{{$n->release_date}}</td>
                                                <td>@foreach($n->categories as $category)
                                                    {{ $category->name }}@if (!$loop->last), @endif
                                                @endforeach</td>
                                                <td>
                                                    <a href="{{route("profile.edit", $n->id)}}">Редактировать</a>
                                                </td>
                                                <td>
                                                    <form action="{{route("profile.destroy", $n->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Удалить</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td> <a href="{{route("profile.create")}}">Добавить новость</a></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>                                                                                               
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection