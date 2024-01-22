<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{
    // Mendapatkan informasi harga barang berdasarkan nama barang
    public function getHarga(Request $request)
    {
        try {
            // Mengambil ID barang berdasarkan nama barang dari database
            $id_barang = Barang::where('nama_barang', $request->nama_barang)->value('id_barang');

            // Mengambil data barang berdasarkan ID
            $barang = Barang::where('id_barang', $id_barang)->first();
            $harga = $barang->harga;
            $nama = $barang->nama_barang;

            // Mengembalikan respons JSON dengan informasi harga dan nama barang
            return response()->json(['harga' => $harga, 'nama' => $nama]);
        } catch (\Exception $e) {
            // Menyimpan detail kesalahan ke log
            Log::error('Error in getHarga method: ' . $e->getMessage());

            // Mengembalikan respons JSON untuk kesalahan server internal
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    // Mendapatkan informasi stok barang berdasarkan nama barang
    public function getStock(Request $request)
    {
        // Mengambil nama barang dari permintaan HTTP
        $namaBarang = $request->input('nama_barang');

        // Mengambil informasi stok barang dari database atau sumber lainnya
        // Sesuaikan bagian ini berdasarkan struktur data dan model Anda
        $barang = Barang::where('nama_barang', $namaBarang)->first();

        if ($barang) {
            // Jika data barang ditemukan, mengembalikan respons JSON dengan informasi stok
            $stock = $barang->stock;
            return response()->json(['stock' => $stock]);
        } else {
            // Jika data barang tidak ditemukan, mengembalikan respons JSON untuk not found
            return response()->json(['error' => 'Informasi stok tidak ditemukan'], 404);
        }
    }
}