<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function tryLogin(Request $request)
    {

    }

////////////////////////////////////////////////////////////////////////////////////

    public function register()
    {
        return view('register');
    }

    public function tryRegister(Request $request)
    {
        
    }
}
