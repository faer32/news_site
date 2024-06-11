<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //разлогирование
    public function logout(){
        auth("web")->logout();
        return redirect('/');
    }
    //показ страницы авторизация
    public function showLoginForm(){
        return view("user.login");
    }
    //процесс авторизации 
    public function login_process(Request $request){
        $requestData = $request->only('email', 'password');
        if(auth("web")->attempt($requestData)) {
            return redirect('/');
        }

        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден"]);
    }
}
