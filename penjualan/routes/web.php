<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\strukController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\cruduserControler;
use App\Http\Controllers\cruduserController;
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
    Route::get('/dashboardKasir', [AdminController::class,'kasir']);
    Route::get('/logout',[UserController::class, 'logout']);
});

Route::middleware(['admin','auth','no-cache'])->group(function(){
    // Route untuk masuk ke halaman dashboard
    Route::get('/dashboardAdmin', [AdminController::class,'admin']);
    
    // Route untuk halaman crud dan history
    Route::get('/CRUDBarang', [AdminController::class,'crudbarang']);
    Route::get('/CRUDKasir', [AdminController::class,'crudkasir']);
    Route::get('/history', [AdminController::class,'history']);

    // prints
    Route::get('/printStruk', [PrintController::class,'struk']);
    Route::get('/printHistory', [PrintController::class,'report']);


    // barang CRUD Function
    Route::post('/barangAddData', [crudbarangController::class,'add']);
    Route::put('/barangEditData/{id}', [crudbarangController::class,'edit']);
    Route::delete('/barangDelete/{id}', [crudbarangController::class,'delete']);
    
    // user crud function
    Route::post('/userAddAccount', [cruduserController::class,'add'])->middleware('web');
    Route::put('/userEditData/{id}', [cruduserController::class,'edit']);
    Route::delete('/userDelete/{id}', [cruduserController::class,'delete']);


    // Tombol-tombol yang ada di web
    Route::get('/print', [strukController::class,'struk']);
   
    Route::get('/getHarga', [BarangController::class,'getHarga']);
    Route::get('/getStock', [BarangController::class,'getStock']);

    
    Route::get('/barangEdit/{id}', [AdminController::class,'editView']);
    Route::get('/barangAdd', [AdminController::class,'addView']);
    Route::get('/kasirAdd', [AdminController::class,'addViewKasir']);
    Route::get('/userEdit/{id}', [AdminController::class,'editViewKasir']);



    // Query Basis data
    Route::get('/stockOrder/asc', [QueryController::class, 'ascend']);
    Route::get('/stockOrder/desc', [QueryController::class,'descend']);
    Route::get('/nameLike/left/{name}', [QueryController::class,'likeLeft']);
    Route::get('/nameLike/middle/{name}', [QueryController::class,'likeMiddle']);
    Route::get('/nameLike/right/{name}', [QueryController::class,'likeRight']);
    //user
    Route::get('/nameOrder/asc', [QueryController::class, 'ascend']);
    Route::get('/nameOrder/desc', [QueryController::class,'descend']);
    Route::get('/nameLikeUser/left/{name}', [QueryController::class,'likeLeft']);
    Route::get('/nameLikeUser/middle/{name}', [QueryController::class,'likeMiddle']);
    Route::get('/nameLikeUser/right/{name}', [QueryController::class,'likeMiddle']);


});