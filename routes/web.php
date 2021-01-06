<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Home\HomeController;

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

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin', 'namespace' => 'Admin'], function () {

    Route::get('kategori/json', 'KategoriController@json');
    Route::get('produk/json', 'ProdukController@json');
    Route::get('pesanan/json', 'PesananController@json');
    Route::get('pesanan/jsonPesananDikirim', 'PesananController@jsonPesananDikirim');

    Route::get('home', 'Home\HomeController@index')->name('admin.page');

    Route::resource('kategori', 'KategoriController');
    Route::resource('produk', 'ProdukController');
    Route::get('pesanan', 'PesananController@index');
    Route::get('pesanan/{id}/cek_barang', 'PesananController@cek_barang');
    Route::get('pesanan/{id}/cetak_alamat', 'PesananController@cetak_alamat');
    Route::get('pesanan/{id}/resi', 'PesananController@resi');
    Route::put('pesanan/{id}/resi', 'PesananController@update');
    Route::get('pesanan_dikirim', 'PesananController@pesanan_dikirim');
});


Route::group(['namespace' => 'user'], function () {
    Route::get('halaman_utama', 'HalamanUtamaController@index');
    Route::get('produk', 'ProdukController@index');
    Route::get('produk/{id}', 'ProdukController@show');
    Route::get('produk/kategori/{id}', 'ProdukController@showByKategori');
    Route::get('cara_bayar', 'PesanController@cara_bayar');

    Route::get('kategori', 'KategoriController@index');

    Route::group(['middleware' => ['auth','role:user']], function () {
        Route::get('biodata/{id}', 'BiodataController@index');
        Route::get('biodata/{id}/edit', 'BiodataController@edit');
        Route::put('biodata/{id}', 'BiodataController@update');

        Route::get('keranjang/{id}', 'KeranjangController@index');
        Route::delete('keranjang/{id}', 'KeranjangController@destroy');
        Route::post('keranjang', 'KeranjangController@store');

        Route::get('pesan', 'PesanController@index');
        Route::get('pesan/{id}', 'PesanController@pesan');

        Route::get('barang_pesanan/{id}', 'BarangPesananController@index');

        Route::get('konfirmasi_pesanan/{id}', 'KonfirmasiPesananController@create');
        Route::post('konfirmasi_pesanan', 'KonfirmasiPesananController@store');
    });
});

Route::get('/', [App\Http\Controllers\User\HalamanUtamaController::class, 'index'])->name('home');
