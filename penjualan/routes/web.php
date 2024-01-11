<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
    Route::get('/dashboardAdmin', [AdminController::class,'admin']);
    Route::get('/dashboardKasir', [AdminController::class,'kasir']);

    Route::get('/logout',[UserController::class, 'logout']);
});