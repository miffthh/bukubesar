<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login', ["title" => "Login"]);
    }

    public function loginproses(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }
        return redirect('login');
    }


    public function register()
    {

        return view('register');
    }

    public function registeruser(Request $request)
    {
        user::create([
            'nidn' => $request->nidn,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => bcrypt(($request->password)),
            'role' => $request->role,
            'remember_token' => Str::random(60),
        ]);
        return redirect('login');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('login');
    }
}
