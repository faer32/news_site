<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    RegistrationController,
    EmailVerificationPromtController,
    VerifyEmailController,
    EmailVerificationNotificationController,
    NewsController,
    ProfileController,
    AuthController
};

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

Auth::routes(['verify' => true]);


//домашняя страница
Route::get('/home', [NewsController::class, 'newsOutput'])->name('home');
//домашняя страница
Route::get('/home/{name}', [NewsController::class, 'newsOutput'])->name('home');

//перенаправление на домашнюю страницу
Route::get('/', function () {
    return redirect('home');
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

//профиль
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //отображение формы авторизации
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.news');

//отображение формы авторизации
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


//процесс авторизации
Route::post('/login_process', [AuthController::class, 'login_process'])->name('login_process');
