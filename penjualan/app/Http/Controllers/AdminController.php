<?php

namespace App\Http\Controllers;

use App\Models\Barang;
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

    public function crudbarang(){
        $barang = Barang::all();
        return view('barang', ['barang'=>$barang]);
    }

    public function crudkasir(){
        return view('accounts');
    }

    public function history(){
        return view('history');
    } 
    public function addView(){
        return view('addBarang');
    }
    
    public function editView($id){
        $barang = Barang::find($id);
        if(!$barang){
            return redirect('/CRUDBarang')->with('error', 'Barang not found');
        }
        return view('editBarang', ['barang' => $barang]);
    }
}