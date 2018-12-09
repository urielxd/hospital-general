<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        if ( Auth::attempt(['email' => $request->email, 'password' => $request->password]) ||  Auth::attempt(['curp' => $request->email, 'password' => $request->password]) ) {
            return redirect()->intended('home');
        } else {
            toast('Email o Curp incorecta','error','center')->autoClose(6000);
            return redirect()->back();
        }
    }
}
