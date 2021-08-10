<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserInfo;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request){
        $request -> validate([
            'login' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:255|confirmed'
        ]);

        $joinDate = date('Y-m-d');
            Auth::login($user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'join_date' => $joinDate,
            'password' => Hash::make($request->password),
        ]));
        
        event(new Registered($user));
        return redirect(RouteServiceProvider::HOME);
    }
}
