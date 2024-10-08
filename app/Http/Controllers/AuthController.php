<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function tryLogin(Request $request)
    {
    
        if(Auth::attempt(['name' => $request['name'], 
                'password' => $request['password']]))
        {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return view('login');
        
    }

////////////////////////////////////////////////////////////////////////////////////

    public function register()
    {
        return view('register');
    }

    public function tryRegister(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        // Cypher password for security purposes
        $data['password'] = Hash::make($data['password']);

        User::create($data);
        
        return redirect()->route('login');
    }
}
