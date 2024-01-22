<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Struk;
use App\Models\Barang;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    // Menampilkan struk
    public function struk(){
        // Mengambil struk terbaru
        $struk = Struk::latest('id_struk')->limit(1)->get();

        // Memeriksa apakah struk tidak kosong
        if ($struk->isNotEmpty()) {
            // Mengambil ID pengguna dari struk
            $id_user = $struk[0]->id;

            // Mengambil data pengguna berdasarkan ID
            $user = User::find($id_user);

            // Mendekode informasi barang dari struk
            $items = json_decode($struk[0]->items, true);
            $itemDetails = [];

            // Looping untuk setiap barang pada struk
            foreach ($items as $item) {
                // Mengambil data barang berdasarkan ID
                $barang = Barang::find($item['id_barang']);

                // Memformat harga sebagai mata uang
                $formattedPrice = number_format($barang->harga, 0, '.', ',');

                // Menghitung total harga untuk setiap barang
                $total = $item['quantity'] * $barang->harga;
                $formattedTotal = number_format($total, 0, '.', ',');

                // Memastikan barang ditemukan sebelum menambahkannya ke daftar
                if ($barang) {
                    $itemDetails[] = [
                        'name' => $barang->nama_barang,
                        'harga' => $formattedPrice,
                        'quantity' => $item['quantity'],
                        'total' => $formattedTotal
                    ];
                }
            }

            // Menampilkan struk dengan informasi yang diperlukan
            return view('struk', ['struk' => $struk, 'user' => $user, 'items' => $items, 'itemss' => $itemDetails]);
        } else {
            // Menangani kasus ketika $struk kosong (tidak ada rekaman ditemukan)
            return view('struk', ['struk' => null, 'user' => null]);
        }
    }

    // Menampilkan laporan
    public function report(){
        // Mengambil semua data struk
        $report = Struk::all();

        // Menampilkan laporan dengan data yang diperlukan
        return view('report',['report' => $report]);
    }
}