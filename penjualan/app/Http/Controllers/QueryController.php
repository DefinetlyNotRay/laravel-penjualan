<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    // Menangani permintaan untuk pengurutan naik
    public function ascend(Request $request, Barang $barangs){
        // Mengambil segmen URL pertama
        $urlSegment = $request->segment(1);

        // Memeriksa segmen URL untuk menentukan model yang digunakan
        if($urlSegment === 'stockOrder'){
            // Mengambil data barang dengan pengurutan stok naik
            $barang = $barangs->orderBy('stock','asc')->get();
            return view('barang', ['barang' => $barang]);
        } else {
            // Mengambil data pengguna dengan pengurutan nama naik
            $user = User::orderBy('name','asc')->get();
            return view('accounts', ['user' => $user]);
        }
    }

    // Menangani permintaan untuk pengurutan turun
    public function descend(Request $request, Barang $barangs){
        // Mengambil segmen URL pertama
        $urlSegment = $request->segment(1);

        // Memeriksa segmen URL untuk menentukan model yang digunakan
        if($urlSegment === 'stockOrder'){
            // Mengambil data barang dengan pengurutan stok turun
            $barang = $barangs->orderBy('stock','desc')->get();
            return view('barang', ['barang' => $barang]);
        } else {
            // Mengambil data pengguna dengan pengurutan nama turun
            $user = User::orderBy('name','desc')->get();
            return view('accounts', ['user' => $user]);
        }
    }

    // Menangani permintaan pencarian dengan pola di tengah
    public function likeMiddle(Request $request, $name){
        // Mengambil segmen URL pertama
        $urlSegment = $request->segment(1);

        // Memeriksa segmen URL untuk menentukan model yang digunakan
        if($urlSegment === 'nameLike'){
            // Mengambil data barang yang memiliki nama di tengah
            $barang = Barang::where('nama_barang','LIKE', '%'.$name . '%')->get();
            return view('barang', ['barang' => $barang]);
        } else {
            // Mengambil data pengguna yang memiliki nama di tengah
            $user = User::where('name','LIKE', '%'.$name . '%')->get();
            return view('accounts', ['user' => $user]);
        } 
    }

    // Menangani permintaan pencarian dengan pola di kiri
    public function likeLeft(Request $request,$name){
        // Mengambil segmen URL pertama
        $urlSegment = $request->segment(1);

        // Memeriksa segmen URL untuk menentukan model yang digunakan
        if($urlSegment === 'nameLike'){
            // Mengambil data barang yang memiliki nama di kiri
            $barang = Barang::where('nama_barang','LIKE',$name . '%')->get();
            return view('barang', ['barang' => $barang]);
        } else {
            // Mengambil data pengguna yang memiliki nama di kiri
            $user = User::where('name','LIKE',$name . '%')->get();
            return view('accounts', ['user' => $user]);
        } 
    }

    // Menangani permintaan pencarian dengan pola di kanan
    public function likeRight(Request $request,$name){
        // Mengambil segmen URL pertama
        $urlSegment = $request->segment(1);

        // Memeriksa segmen URL untuk menentukan model yang digunakan
        if($urlSegment === 'nameLike'){
            // Mengambil data barang yang memiliki nama di kanan
            $barang = Barang::where('nama_barang','LIKE', '%'.$name)->get();
            return view('barang', ['barang' => $barang]);
        } else {
            // Mengambil data pengguna yang memiliki nama di kanan
            $user = User::where('name','LIKE','%'.$name )->get();
            return view('accounts', ['user' => $user]);
        } 
    }
}