<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cruduserController extends Controller
{
    function add(Request $request){
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);
        User::create([
            'name' => $request->nama,
            'password' => bcrypt($request->password),
            'level' => $request->level
        ]);
        return redirect('/CRUDKasir')->with('success', 'Account created successfully!');

    }

    public function edit(Request $request, $id) {
        $user = User::find($id);
    
        if (!$user) {
            return redirect('/CRUDKasir')->with('error', 'User not found');
        }
    
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);
    
        // Update the attributes on the instance
        $user->update([
            'name' => $request->nama,
            'password' => bcrypt($request->password),
            'level' => $request->level
        ]);
    
        return redirect('/CRUDKasir');
    }


    public function delete($id) {
        $Kasir = User::find($id);
    
        if (!$Kasir) {
            return redirect('/CRUDKasir')->with('error', 'User not found');
        }
    
        // Update the attributes on the instance
        $Kasir->delete();
        $totalRow = DB::table('users')->max('id');
        DB::statement("ALTER TABLE users AUTO_INCREMENT =  $totalRow");   
        return redirect('/CRUDKasir');
    }
}