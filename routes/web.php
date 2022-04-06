<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('pesan/{id}', [App\Http\Controllers\PesanController::class, 'index'])->name('Halaman Pemesanan');
Route::post('pesan/{id}', [App\Http\Controllers\PesanController::class, 'pesan']);
Route::get('cart', [App\Http\Controllers\PesanController::class, 'cart'])->name('Shopping Cart');
Route::delete('cart/{id}', [App\Http\Controllers\PesanController::class, 'delete']);
Route::get('konfirmasi-checkout', [App\Http\Controllers\PesanController::class, 'konfirmasi']);
Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('edit-profile', [App\Http\Controllers\ProfileController::class, 'edit']);
Route::post('edit-profile', [App\Http\Controllers\ProfileController::class, 'update']);
Route::get('edit-password', [App\Http\Controllers\ProfileController::class, 'password']);
Route::post('edit-password', [App\Http\Controllers\ProfileController::class, 'update_pass']);
Route::get('history', [App\Http\Controllers\HistoryController::class, 'index']);
Route::get('history/{id}', [App\Http\Controllers\HistoryController::class, 'detail']);
