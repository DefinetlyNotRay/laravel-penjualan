<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function ascend(Barang $barangs){
        $barang = $barangs->orderBy('stock','asc')->get();
        return view('barang', ['barang' => $barang]);
    }
    public function descend(Barang $barangs){
        $barang = $barangs->orderBy('stock','desc')->get();
        return view('barang', ['barang' => $barang]);
    }
    public function likeMiddle($name){
        $barang = Barang::where('nama_barang','LIKE', '%'.$name . '%')->get();
        return view('barang', ['barang' => $barang]);
    }
    public function likeLeft($name){
        $barang = Barang::where('nama_barang','LIKE',$name . '%')->get();
        return view('barang', ['barang' => $barang]);
    }
    public function likeRight($name){
        $barang = Barang::where('nama_barang','LIKE', '%'.$name)->get();
        return view('barang', ['barang' => $barang]);
    }


    // User
    public function ascendUser(User $users){
        $user = $users->orderBy('name','asc')->get();
        return view('accounts', ['user' => $user]);
    }
    public function descendUser(User $users){
        $user = $users->orderBy('name','desc')->get();
        return view('accounts', ['user' => $user]);
    }
    public function likeMiddleUser($name){
        $User = User::where('name','LIKE', '%'.$name . '%')->get();
        return view('accounts', ['user' => $User]);
    }
    public function likeLeftUser($name){
        $user = User::where('name','LIKE',$name . '%')->get();
        return view('accounts', ['user' => $user]);
    }
    public function likeRightUser($name){
        $user = User::where('name','LIKE','%'.$name  )->get();
        return view('accounts', ['user' => $user]);
    }
}