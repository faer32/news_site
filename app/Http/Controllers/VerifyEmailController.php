<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    //подтверждает почту пользователя как подтвержденную
    public function __invoke(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/');
    }
}
