<?php
// app/Http/Controllers/PlaceAuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('place.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('place')->attempt($credentials)) {
            return redirect()->intended('/place/dashboard');
        }

        return back()->withErrors(['email' => 'ログインに失敗しました']);
    }

    public function logout()
    {
        Auth::guard('place')->logout();
        return redirect('/place/login');
    }
}
