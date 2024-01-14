<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin(){
        $barang = DB::table('barang')->get();
        return view('dashboardAdmin', ['barang'=>$barang]);
    }
    public function kasir(){
        return view('dashboardKasir');
    }
    
}