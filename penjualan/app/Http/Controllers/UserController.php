<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    public function index(){
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
    
        $loginInfo = [
            'name' => $request->name,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($loginInfo)) {
            if(Auth::user()->level=='admin'){
                return redirect('/dashboardAdmin');
            }else if(Auth::user()->level=='kasir'){
                return redirect('/dashboardKasir');
            }
        }
    
        return redirect('/')->with('error', 'Invalid credentials');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    
}