<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromtController extends Controller
{
    // Проверяет подтвердил ли пользователь почту
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
        ? redirect()->intended(RouteServiceProvider::HOME)
        : view('user.verify_email');
    }
}
