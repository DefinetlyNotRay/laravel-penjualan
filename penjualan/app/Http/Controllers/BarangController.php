<?php

namespace App\Http\Controllers;


use App\Models\Barang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{
    public function getHarga(Request $request)
{
    try {
        $id_barang = Barang::where('nama_barang', $request->nama_barang)->value('id_barang');

        $barang = Barang::where('id_barang', $id_barang)->first();
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