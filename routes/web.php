<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Crudcontroller;
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

Route::middleware('web')->group(function () {
    Route::get('login', function () {
        return view('login');
    })->name('login');
    Route::post('login', [Authcontroller::class, 'login']);
    Route::post('register', [Authcontroller::class, 'tambahuser']);
    Route::get('register', [Authcontroller::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('tambahkue', [Crudcontroller::class, 'tambahdatakue']);
    Route::get('keluar_admin', [Authcontroller::class, 'keluaradmin']);
    Route::get('logout', [Authcontroller::class, 'keluaruser'])->name('logout');
    Route::get('read', [Crudcontroller::class, 'lihatdata'])->name('read');
    Route::get('/', [Crudcontroller::class, 'menu_user'])->name('index');
    Route::get('keranjang', [Crudcontroller::class, 'lihatkeranjang'])->name('keranjang');
    Route::get('report', [Crudcontroller::class, 'lihatreport'])->name('report');
    Route::get('hapus/{kode_kue}', [Crudcontroller::class, 'hapusdata']);
    Route::get('kirim_kue/{kode_kue}', [Crudcontroller::class, 'report']);
    Route::get('batalsemuakeranjang/{id_user}', [Crudcontroller::class, 'hapus_semua_keranjang']);
    Route::get('batalkeranjang/{kode_kue}', [Crudcontroller::class, 'hapuskeranjang']);
    Route::get('editkue/{kode_kue}', [Crudcontroller::class, 'editdata']);
    Route::get('beliitemkue/{kode_kue}', [Crudcontroller::class, 'belikue']);
    Route::post('prosestambah', [Crudcontroller::class, 'tambahdata']);
    Route::post('proseskeranjang/{kode_kue}', [Crudcontroller::class, 'tambahkeranjang']);
    Route::post('proseseditdata', [Crudcontroller::class, 'proseseditdata']);
});
// "laravelcollective/html" : "^6.2"
// Collective\Html\HtmlServiceProvider::class,
// 'Form' => Collective\Html\FormFacade::class,
// 'Html' => Collective\Html\HtmlFacade::class,
