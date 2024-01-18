<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crudbarangController extends Controller
{
    public function add(Request $request){
        $barangData = $request->validate([
            'nama_barang' => 'required',
            'stock' => 'required',
            'harga' => 'required'
        ]);
        Barang::create($barangData);
        
        return redirect('/CRUDBarang');
    }
    
    public function edit(Request $request, $id) {
        $barang = Barang::find($id);
    
        if (!$barang) {
            return redirect('/CRUDBarang')->with('error', 'Barang not found');
        }
    
        $barangData = $request->validate([
            'nama_barang' => 'required',
            'stock' => 'required',
            'harga' => 'required'
        ]);
    
        // Update the attributes on the instance
        $barang->update($barangData);
    
        return redirect('/CRUDBarang');
    }

    public function delete($id) {
        $barang = Barang::find($id);
    
        if (!$barang) {
            return redirect('/CRUDBarang')->with('error', 'Barang not found');
        }
    
        // Update the attributes on the instance
        $barang->delete();
        $totalRow = DB::table('barang')->max('id_barang');
        DB::statement("ALTER TABLE barang AUTO_INCREMENT =  $totalRow");   
        return redirect('/CRUDBarang');
    }
    
}