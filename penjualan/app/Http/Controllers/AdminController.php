<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('dashboardAdmin');
    }
    public function kasir(){
        return view('dashboardKasir');
    }
    
}