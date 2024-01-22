<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    // Menampilkan halaman login
    public function index(){
        return view('login');
    }

    // Proses login pengguna
    public function login(Request $request)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
    
        // Menyiapkan informasi login
        $loginInfo = [
            'name' => $request->name,
            'password' => $request->password,
        ];
    
        // Mengecek apakah informasi login valid
        if (Auth::attempt($loginInfo)) {
            // Mengecek level pengguna dan mengarahkan ke dashboard sesuai level
            if(Auth::user()->level=='admin'){
                return redirect('/dashboardAdmin')->with('message','Berhasil! Anda berhasil login');
            } else if(Auth::user()->level=='kasir'){
                return redirect('/dashboardKasir')->with('message','Berhasil! Anda berhasil login');;
            }
        }
    
        // Meredirect kembali ke halaman login jika informasi login tidak valid
        return redirect('/')->with('error', 'Kredensial tidak valid');
    }

    // Proses logout pengguna
    public function logout(){
        Auth::logout();
        return redirect('/')->with('message', 'Berhasil Keluar');
    }
    
}