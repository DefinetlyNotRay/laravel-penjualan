<?php

namespace App\Http\Controllers;

use App\Models\Struk;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StrukController extends Controller
{
    // Menghandle pembuatan struk
    public function struk(Request $request){
        try{
            // Mengambil nilai dari request
            $hargaValue = $request->input('hargaValue');
            $diskonValue = $request->input('diskonValue');
            $discountedHargaValue = $request->input('beforeDiscount');
            $qty = $request->input('qtyValue');
            $barangNames = $request->input('barangValues');
            $quantitasBarang = $request->input('quantitasBarang');
            $jumlahTunai =  $request->input('jumlahTunai');
            $users = $request->input('userid');
            $kembalian = $request->input('kembalianTotal');

            // Menyiapkan array untuk data barang
            $itemsData = [];
            foreach ($barangNames as $index => $barangName) {
                $barang = Barang::where('nama_barang', $barangName)->first();

                if ($barang) {
                    $itemsData[] = [
                        'id_barang' => $barang->id_barang,
                        'quantity' => $quantitasBarang[$index],
                    ];
                } else {
                    // Mengatasi kasus jika barang tidak ditemukan
                }
            }

            // Mengonversi array id barang ke dalam bentuk string JSON
            $itemsJson = json_encode($itemsData);

            // Mengonversi array jumlah barang dibeli ke dalam bentuk string
            $quantitiesBoughtString = implode(',', $quantitasBarang);
            $barangId = [];
            foreach ($barangNames as $barangName) {
                $barang = Barang::where('nama_barang', $barangName)->first();

                if ($barang) {
                    $barangId[] = $barang->id_barang;
                } else {
                    // Mengatasi kasus jika barang tidak ditemukan
                }
            }

            // Mengonversi array id barang ke dalam bentuk string
            $itemIdsString = implode(',', $barangId);

            // Mengambil id barang yang merupakan string hasil gabungan
            $itemIdsStrings = implode('', $barangId);

            // Mengonversi array jumlah barang dibeli ke dalam bentuk string
            $quantitiesBoughtString = implode(',', $quantitasBarang);

            // Memastikan data tidak melebihi panjang yang ditentukan
            $id_barang = substr($itemIdsStrings, 0, 255);

            // Mengambil informasi pengguna yang sedang login
            $user = Auth::user();

            // Menyiapkan data untuk struk
            $strukData = [
                'id' => $user->id,
                'id_barang' => $itemIdsStrings,
                'items' => $itemsJson,
                'jumlah_barang' => $qty,
                'diskon' => $diskonValue,
                'total' => $hargaValue,
                'tunai' => $jumlahTunai,
                'jumlah_total' => $discountedHargaValue,
                'kembalian' => $kembalian,
            ];

            // Membuat data struk
            Struk::create($strukData);

            // Memanggil stored procedure untuk mengupdate stok barang
            DB::statement('CALL UpdateStockForBarang(?, ?)', [$itemIdsString, $quantitiesBoughtString]);

            // Merespons dengan pesan sukses dan URL redirect
            return response()->json(['message' => 'Data processed successfully', 'redirect_url' => '/printStruk']);

        } catch (\Exception $e) {
            // Mencatat pesan kesalahan ke log
            Log::error($e->getMessage());

            // Merespons dengan pesan kesalahan internal server
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}