<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller 
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only("username", "password");
        $remember_me = $request->input("rememberMe");

        if (Auth::attempt($credentials, $remember_me)) 
        {
            return redirect("/");
        }
    }

    public function register(Request $request)
    {
        $credentials = $request->only("username", "password", "repeat_password");

        Log::info($request);
        Log::info($credentials);

        $new_user = new User;

        $new_user->username = $credentials["username"];
        
        if ($credentials["password"] == $credentials["repeat_password"]) 
        {
            $new_user->password = Hash::make($credentials["password"]);

            $new_user->save();

            Auth::login($new_user);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/");
    }
}