<?php

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
Auth::routes();

Route::get('/','HomeController@index')->name('home.user');

//proses cart barang
Route::get('add-to-cart/{id}', 'KeranjangController@addToCart');
Route::get('detail-keranjang', 'KeranjangController@detailKeranjang')->name('keranjang.detail');
Route::get('update-cart', 'KeranjangController@updateKeranjang')->name('keranjang.update');
Route::get('hapus-cart/{id}', 'KeranjangController@hapusKeranjang')->name('keranjang.hapus');
// Proses Checkout
Route::get('checkout','CheckoutController@index')->name('checkout.index');
Route::post('store-checkout','CheckoutController@store')->name('checkout.store');
Route::get('payment/{id}','PaymentController@detailPayment')->name('payment');
Route::get('sudahBayar/{id}','PaymentController@sudahBayar')->name('sudahBayar');
Route::post('midtrans/va-payment','CheckoutController@PembayaranOnline')->name('payment.proses');

// User
Route::group(
    ['namespace'=>'User','prefix'=>'user'],function(){
        route::get('myorder','OrderController@myorder')->name('myOrder');
        route::get('myorder/{id}','OrderController@detailOrder')->name('detail.order');
    }
);



Route::prefix('admin')->group(function () {
    Route::get('admin-login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Admin\Auth\LoginController@login');
    Route::POST('admin-logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

    // Dashboard
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');

    // Kategori
    Route::resource('Kategori', 'Admin\KategoriController');
    Route::get('get-data','Admin\KategoriController@getData')->name('kategori.data');
});


