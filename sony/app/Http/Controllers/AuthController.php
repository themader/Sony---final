<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if(Auth::attempt($credentials)){
            return redirect()
                ->intended(route('users.index'))
                ->with('feedback.message', 'Sesion iniciada');
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('feedback.message', 'las credenciales son incorrectas');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.login')
            ->with('feedback.message', 'Sesion cerrada Correctamente');
    }

}
