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
                        <div class="col-md-9 bg-white p-4 mb-5 mx-2 rounded custom-shadow">
                            <h2 class="text-center mb-4">Регистрация</h2>
                            <form action="{{route('register_process')}}" method="post">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">Имя*</label>
                                        <input type="text" name="name" class="form-control" id="firstName"
                                            placeholder="Введите ваше имя" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Фамилия*</label>
                                        <input type="text" name="lastName" class="form-control" id="lastName"
                                            placeholder="Введите вашу фамилию" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Введите ваш email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password1" class="form-label">Пароль*</label>
                                        <input type="password" name="password" class="form-control" id="password1"
                                            placeholder="Введите пароль" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password2" class="form-label">Подтверждение пароля*</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password2"
                                            placeholder="Подтвердите пароль" required>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-dark btn-block">Зарегистрироваться</button>
                            </form>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection