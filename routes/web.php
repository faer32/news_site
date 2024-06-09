<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    RegistrationController,
    EmailVerificationPromtController,
    VerifyEmailController,
    EmailVerificationNotificationController,
    NewsController
};

use Illuminate\Http\Request;


Auth::routes(['verify' => true]);

//домашняя страница
Route::get('/home', [NewsController::class, 'newsOutput'])->name('home');

//перенаправление на домашнюю страницу
Route::get('/', function () {
    return redirect('/home');
});

//подтверждение email
Route::get('/email/verify', [EmailVerificationPromtController::class, '__invoke'])->middleware(['auth'])
->name('verification.notice');

//отравка ссылки подтверждения email
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['auth','signed'])
->name('verification.verify');

//проверка подтверждения почты
Route::get('/email/verification_notification', [EmailVerificationNotificationController::class, '__invoke'])->middleware('auth')->name('verification.send');

//отображение формы регистрация
Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])
->name('registration');

//регистрация
Route::post('/register_process', [RegistrationController::class, 'register'])->name('register_process');