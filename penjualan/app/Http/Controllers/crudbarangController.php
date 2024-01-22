<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudBarangController extends Controller
{
    // Menambahkan barang baru
    public function add(Request $request){
        // Validasi data barang yang diterima dari formulir
        $barangData = $request->validate([
            'nama_barang' => 'required',
            'stock' => 'required',
            'harga' => 'required'
        ]);

        // Menyimpan data barang ke dalam database
        Barang::create($barangData);

        // Mengarahkan kembali ke halaman CRUDBarang dengan pesan sukses
        return redirect('/CRUDBarang')->with('message', 'Barang berhasil ditambahkan');
    }
    
    // Mengedit data barang berdasarkan ID
    public function edit(Request $request, $id) {
        // Mengambil data barang berdasarkan ID
        $barang = Barang::find($id);
    
        // Jika barang tidak ditemukan, mengarahkan kembali dengan pesan error
        if (!$barang) {
            return redirect('/CRUDBarang')->with('error', 'Barang tidak ditemukan');
        }
    
        // Validasi data barang yang diterima dari formulir
        $barangData = $request->validate([
            'nama_barang' => 'required',
            'stock' => 'required',
            'harga' => 'required'
        ]);
    
        // Mengupdate atribut barang dengan data baru
        $barang->update($barangData);
    
        // Mengarahkan kembali ke halaman CRUDBarang dengan pesan sukses
        return redirect('/CRUDBarang')->with('message', 'Barang berhasil diubah');
    }

    // Menghapus data barang berdasarkan ID
    public function delete($id) {
        // Mengambil data barang berdasarkan ID
        $barang = Barang::find($id);
    
        // Jika barang tidak ditemukan, mengarahkan kembali dengan pesan error
        if (!$barang) {
            return redirect('/CRUDBarang')->with('error', 'Barang tidak ditemukan');
        }
    
        // Menghapus data barang
        $barang->delete();

        // Mengatur ulang nilai otomatis penambahan ID barang
        $totalRow = DB::table('barang')->max('id_barang');
        DB::statement("ALTER TABLE barang AUTO_INCREMENT =  $totalRow");   

        // Mengarahkan kembali ke halaman CRUDBarang dengan pesan sukses
        return redirect('/CRUDBarang')->with('message', 'Barang berhasil dihapus');
    }
}