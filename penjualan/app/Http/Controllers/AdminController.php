<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = User::all();
        return view('accounts', ['user' => $user]);
    }

    public function history(){
        return view('history');
    } 
    public function addView(){
        return view('addBarang');
    }

    public function addViewKasir(){
        return view('addKasir');
    }
    
    public function editView($id){
        $barang = Barang::find($id);
        if(!$barang){
            return redirect('/CRUDBarang')->with('error', 'Barang not found');
        }
        return view('editBarang', ['barang' => $barang]);
    }

    public function editViewKasir($id){
        $user = User::find($id);
        if(!$user){
            return redirect('/CRUDKasir')->with('error', 'user not found');
        }
        return view('editKasir', ['user' => $user]);
    }
}