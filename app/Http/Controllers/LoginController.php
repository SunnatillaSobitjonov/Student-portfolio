<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException; // To'g'ri namespace ishlatildi

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation

        $attributes = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required'],
        ]);
        //check

        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=> 'The provided credentials do not match our records.',
            ]);
        }
        //session regenerate

        $request->session()->regenerate();
        //redirect to student page 

        return redirect('/');
    
    }
    public function logout()
    {
        Auth::logout();
        
        return redirect('/');
    }
}
