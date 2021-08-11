<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use Auth;

class LoginController extends Controller
{
    public function ingresar()
    {
        $credenciales = request()->only(['email', 'password']);
        if (Auth::attempt($credenciales))
        {
            request()->session()->regenerate();

            if(Administrador::find(Auth::user()->dni) != NULL)
                session(['isAdmin' => true]);
            else
                session(['isAdmin' => false]);

            return redirect('home');
        }
        else
        {
            return redirect()->route('login');
        }    
    }

    public function salir()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect('home');
    }
}
