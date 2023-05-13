<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $cek_login = $request->only('email', 'password');
        if(Auth::attempt($cek_login)) {
            // return redirect()->intended('/dashboard');
            $role = Auth::user()->role;
            if ($role == 'admin'){
                return redirect()->intended('/dashboard');
            }elseif ($role == 'kasir'){
                return redirect()->intended('/dashboard');
            }elseif ($role == 'customer'){
                return redirect()->intended('/customer');
            }
        }else{
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
