<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\strukController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\crudbarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function(){
    Route::get('/',[UserController::class, 'index'])->name('login');;    

    Route::post('/login',[UserController::class, 'login']);    


});
Route::get('/home', function(){

    
    return redirect('/dashboard');
});




Route::middleware(['auth','no-cache'])->group(function(){
    // Route untuk masuk ke halaman dashboard
    Route::get('/dashboardAdmin', [AdminController::class,'admin']);
    Route::get('/dashboardKasir', [AdminController::class,'kasir']);
    
    // Route untuk halaman crud dan history
    Route::get('/CRUDBarang', [AdminController::class,'crudbarang']);
    Route::get('/CRUDKasir', [AdminController::class,'crudkasir']);
    Route::get('/history', [AdminController::class,'history']);


    Route::post('/barangAddData', [crudbarangController::class,'add']);
    Route::put('/barangEditData/{id}', [crudbarangController::class,'edit']);
    Route::delete('/barangDelete/{id}', [crudbarangController::class,'delete']);
    
    
    // Tombol-tombol yang ada di web
    Route::get('/print', [strukController::class,'struk']);
    Route::get('/logout',[UserController::class, 'logout']);
    Route::get('/getHarga', [BarangController::class,'getHarga']);
    Route::get('/barangEdit/{id}', [AdminController::class,'editView']);
    Route::get('/barangAdd', [AdminController::class,'addView']);
    Route::get('/getHarga', [BarangController::class,'getHarga']);
});