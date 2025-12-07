<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $authVariables = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($authVariables)) {
            throw ValidationException::withMessages(['email' => 'Sorry incorrect credentials']);
        }

        request()->session()->regenerate();
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/login');
    }
    public function password()
    {
        return view('auth.change-password');
    }

    public function storePassword()
    {
        request()->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed'],
        ]);

        auth()->user()->update([
            'password' => bcrypt(request('password')),
        ]);

        return redirect('/')->with('success', 'Password updated!');
    }

    public function admin()
    {
        $user = Auth::user();
        return view('auth.admin-profile', ['user' => $user]);
    }

    public function storeAdmin()
    {
        request()->validate([
            'name' => ['required'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(Auth::user()->id)
            ]
        ]);

        auth()->user()->update([
            'name' => request('name'),
            'email' => request('email')
        ]);

        return redirect('/admin');
    }
}
