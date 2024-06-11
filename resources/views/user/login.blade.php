@extends('layouts.main')

@section('content')           
<!-- Контент -->
<div class="container">
    <div class="row mt-1">
        <div class="col-lg-2">
            <!-- Пустой блок на усмотрение -->
        </div>
        <div class="col-lg-10">
            <!-- Контент на странице -->
            <div class="row">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 bg-white p-4 mb-4 mx-3 rounded custom-shadow">
                            <h2 class="text-center mb-4">Авторизация</h2>
                            <form action="{{ route('login_process') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Электронная почта</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Введите вашу электронную почту" required minlength="5">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Пароль</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Введите ваш пароль" required minlength="8">
                                </div>
                                <button type="submit" class="btn btn-dark btn-block">Войти</button>
                            </form>
                            <br>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="mt-3">
                                {{-- <a href="{{ route('email') }}">Забыли пароль?</a> |  --}}
                                <a href="{{ route('registration') }}">Создать аккаунт</a>
                            </div>
                            <hr>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection