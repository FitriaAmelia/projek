<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// //Hanya untuk role admin
// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
//     Route::get('/', function () {
//         return 'halaman admin';
//     });

//     Route::get('profile', function () {
//         return 'halaman profile admin';
//     });
// });

// //Hanya untuk role pengguna
// Route::group(['prefix' => 'pengguna', 'middleware' => ['auth', 'role:pengguna']], function () {
//     Route::get('/', function () {
//         return 'halaman pengguna';
//     });

//     Route::get('profile', function () {
//         return 'halaman profile pengguna';
//     });
// });

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
//     Route::get('driver', function () {
//         return view('driver.index');
//     })->middleware(['role:admin|pengguna']);

// });
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('pelanggan', PelangganController::class)->middleware(['role:admin']);
    Route::resource('supir', SupirController::class)->middleware(['role:admin']);
    Route::resource('kendaraan', KendaraanController::class)->middleware(['role:admin']);
    Route::resource('transaksi', TransaksiController::class)->middleware(['role:admin']);

});

// Route::resource('admin/pelanggan', PelangganController::class);
// Route::resource('admin/penyewa', PenyewaController::class);
// Route::resource('admin/mobil', MobilController::class);
// Route::resource('admin/sewa', SewaController::class);
// Route::resource('admin/transaksi', TransaksiController::class);
