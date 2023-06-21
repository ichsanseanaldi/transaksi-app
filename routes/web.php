<?php

use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesDetController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return redirect('/transaksi');
});

Route::resource('/transaksi', SalesController::class);

Route::resource('/history', SalesDetController::class);