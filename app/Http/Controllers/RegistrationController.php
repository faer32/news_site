<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegistrationController extends Controller
{
    public function showRegistrationForm(){
        return view("user.registration");
    }

    public function register(Request $request){
        // $request->validate([
        //     "email" => ["unique:users,email"],
        //     "username" => ["unique:users,username"]
        // ]);

        $user = User::create([
            "name" => $request["name"],
            "lastName" => $request["lastName"],
            "username" => $request["username"],
            "email" => $request["email"],
            "password" => bcrypt($request["password"]),
        ]);
        
        event(new Registered($user));

        if($user){
            auth("web")->login($user);
        }

        return redirect(('/'));
    }
}
