<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function getHarga(Request $request)
{
    try {
        $barang = DB::table('barang')->where('id_barang', $request->id_barang)->first();
        $harga = $barang->harga;
        $nama = $barang->nama_barang;
        return response()->json(['harga' => $harga, 'nama' => $nama]);
    } catch (\Exception $e) {
        // Log the error details
        Log::error('Error in getHarga method: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

    

}