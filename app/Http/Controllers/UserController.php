<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('users.loginUser');
    }

    public function create()
    {
        return response()->view('users.createUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'password' => 'required|max:255',
            'email' => 'required|email'
        ]);

        $user = new User;
        $user->name = $request->input('user_name');
//        $user->password = Hash::make($request->input('password'));
        $user->password = $request->input('password');
        $user->email = $request->input('email');

        $user->save();

        return response()->redirectTo('/', 201);

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
           'email' => 'required|string|max:255',
           'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('/wire/all');
        }

        return back()->withErrors([
            'email' => 'Пользователь не найден'
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/wire/all');
    }
}
