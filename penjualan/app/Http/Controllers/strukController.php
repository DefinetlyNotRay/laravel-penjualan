<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class strukController extends Controller
{
    public function struk(Request $request){
        $hargaValue = $request->input('hargaValue');
        $diskonValue = $request->input('diskonValue');
        $discountedHargaValue = $request->input('discountedHargaValue');
        $qty = $request->input('qty');
        $barangNames = $request->input('barangValues');
        $quantitasBarang = $request->input('quantitasBarang');
        $jumlahTunai =  $request->input('jumlahTunai');
        $users = $request->input('userid');

        $barangId = [];
        foreach ($barangNames as $barangName){
            $barang = Barang::where('nama_barang', $barangName)->first();
            
            if($barang){
                $barangId[] = $barang->id_barang;
            } else{
                
            }
        }

        $itemIdsString = implode(',', $barangId);
        $quantitiesBoughtString = implode(',', $quantitasBarang);
        
        $result = DB::select('CALL UpdateStockForBarang(?, ?)', [$itemIdsString, $quantitiesBoughtString]);

        foreach ($result as $row) {
            // Process the result as needed
            echo $row->message;  // This assumes that 'message' is a property of the stdClass object
        }
        var_dump($result);
    }
}