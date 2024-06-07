<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    // отправляет ссылку на почту, в случае если пользователь подтвердил уже, идет перенаправление на home
    public function __invoke(Request $request)
    {
        if ($request->user()->hasVerifiedEmail())
        {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message','Ссылка для подтверждения отправлена');
    }
}
