<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudUserController extends Controller
{
    // Menambahkan pengguna baru
    public function add(Request $request){
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        // Membuat pengguna baru
        User::create([
            'name' => $request->nama,
            'password' => bcrypt($request->password),
            'level' => $request->level
        ]);

        // Mengarahkan kembali ke halaman CRUDKasir dengan pesan sukses
        return redirect('/CRUDKasir')->with('message', 'Akun berhasil dibuat!');
    }

    // Mengedit data pengguna berdasarkan ID
    public function edit(Request $request, $id) {
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($id);
    
        // Jika pengguna tidak ditemukan, mengarahkan kembali dengan pesan error
        if (!$user) {
            return redirect('/CRUDKasir')->with('error', 'Pengguna tidak ditemukan');
        }
    
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);
    
        // Mengupdate atribut pengguna dengan data baru
        $user->update([
            'name' => $request->nama,
            'password' => bcrypt($request->password),
            'level' => $request->level
        ]);
    
        // Mengarahkan kembali ke halaman CRUDKasir dengan pesan sukses
        return redirect('/CRUDKasir')->with('message', 'Akun berhasil diperbarui');
    }

    // Menghapus data pengguna berdasarkan ID
    public function delete($id) {
        // Mengambil data pengguna berdasarkan ID
        $kasir = User::find($id);
    
        // Jika pengguna tidak ditemukan, mengarahkan kembali dengan pesan error
        if (!$kasir) {
            return redirect('/CRUDKasir')->with('error', 'Pengguna tidak ditemukan');
        }
    
        // Menghapus data pengguna
        $kasir->delete();

        // Mengatur ulang nilai otomatis penambahan ID pengguna
        $totalRow = DB::table('users')->max('id');
        DB::statement("ALTER TABLE users AUTO_INCREMENT =  $totalRow");   

        // Mengarahkan kembali ke halaman CRUDKasir dengan pesan sukses
        return redirect('/CRUDKasir')->with('message', 'Akun berhasil dihapus');
    }
}