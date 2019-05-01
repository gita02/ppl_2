<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use AuthenticatesPengguna;

class PenggunaLoginController extends Controller
{
    protected $redirectTo = '/pengguna/home';

    public function __construct()
    {
        $this->middleware('guest:pengguna')->except('logout')->except('index');
    }
    
    public function index(){
          return view('pengguna.home');
    }
    
    public function showLoginForm()
    {
          return view('pengguna.auth.login');
    }
    
    public function showRegisterForm()
    {
          return view('pengguna.auth.register');
    }
    
    public function username()
    {
            return 'username';
    }
    
    protected function guard()
    {
          return Auth::guard('pengguna');
    }
    
    public function register(Request $request)
    {
          $request->validate([
              'username'      => 'required|string|unique:pengguna',
              'email'         => 'required|string|email|unique:pengguna',
              'password'      => 'required|string|min:6|confirmed'
          ]);
          Pengguna::create($request->all());
          return redirect()->route('pengguna.registerform')->with('success', 'Successfully register!');
    }
}
