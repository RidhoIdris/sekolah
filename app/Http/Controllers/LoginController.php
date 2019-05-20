<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
    	if (!\Auth::attempt([
    		'email' => request('email'),
    		'password' =>request('pass')
    	])) {
    		return redirect()->back()->withDanger('Email Atau Password Salah');
    	}else{
    		return redirect()->route('dashboard');
    	}
    }

    public function logout()
    {
    	\Auth::logout();
    	return redirect('/login');
    }

    public function register ()
    {
        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('admin123'),
        ]);
    }
}
