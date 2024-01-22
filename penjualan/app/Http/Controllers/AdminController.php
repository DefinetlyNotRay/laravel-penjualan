<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Struk;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin dengan data barang
    public function admin(){
        $barang = DB::table('barang')->get();
        return view('dashboardAdmin', ['barang'=>$barang]);
    }

    // Menampilkan halaman dashboard kasir
    public function kasir(){
        return view('dashboardKasir');
    }

    // Menampilkan halaman CRUD barang dengan data barang
    public function crudbarang(){
        $barang = Barang::all();
        return view('barang', ['barang'=>$barang]);
    }

    // Menampilkan halaman CRUD kasir dengan data pengguna
    public function crudkasir(){
        $user = User::all();
        return view('accounts', ['user' => $user]);
    }

    // Menampilkan halaman riwayat transaksi dengan detail barang
    public function history(){
        $allStruks = Struk::all();
        $itemDetails = [];
    
        foreach ($allStruks as $struk) {
            $items = json_decode($struk->items, true);
            $entryDetails = [];
    
            foreach ($items as $item) {
                $barang = Barang::find($item['id_barang']);
    
                if ($barang) {
                    $formattedPrice = number_format($barang->harga, 0, '.', ',');
                    $total = $item['quantity'] * $barang->harga;
                    $formattedTotal = number_format($total, 0, '.', ',');
    
                    $entryDetails[] = [
                        'name' => $barang->nama_barang,
                        'harga' => $formattedPrice,
                        'quantity' => $item['quantity'],
                        'total' => $formattedTotal
                    ];
                }
            }
    
            $itemDetails[] = [
                'struk' => $struk,
                'barang' => $entryDetails,
            ];
        }
    
        return view('history', ['itemDetails' => $itemDetails]);
    }

    // Menampilkan halaman tambah barang
    public function addView(){
        return view('addBarang');
    }

    // Menampilkan halaman tambah kasir
    public function addViewKasir(){
        return view('addKasir');
    }
    
    // Menampilkan halaman edit barang berdasarkan ID
    public function editView($id){
        $barang = Barang::find($id);
        if(!$barang){
            return redirect('/CRUDBarang')->with('error', 'Barang tidak ditemukan');
        }
        return view('editBarang', ['barang' => $barang]);
    }

    // Menampilkan halaman edit kasir berdasarkan ID
    public function editViewKasir($id){
        $user = User::find($id);
        if(!$user){
            return redirect('/CRUDKasir')->with('error', 'Pengguna tidak ditemukan');
        }
        return view('editKasir', ['user' => $user]);
    }
}