<?php

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
    return view('home');
});

Auth::routes();

Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});

Route::group(['middleware'=> 'auth'], function(){
  Route::get('/histori/{id}','KasirController@histori');
  Route::resource('kasir','KasirController');
  Route::get('/cetak-kwitansi/{id}','CetakController@cetakKwitansi');

  Route::group(['middleware'=> 'admin'], function(){
    Route::resource('admin','AdminController');
    Route::resource('tanah', 'TanahController');
    Route::resource('pembeli','PembeliController');
    Route::post('/order/additems', 'OrderController@addItems');
    Route::post('/simpan-checkout', 'OrderController@simpanCheckOut');
    Route::get('/beli-tanah/{id}', 'OrderController@beliTanah');
    Route::get('/check-out/{id}', 'OrderController@checkOut');
    Route::delete('/hapus-kavling/{kredit_id}/{no}/{id}', 'OrderController@hapusKav');
    Route::resource('order', 'OrderController');
    Route::resource('kredit','KreditController');
    Route::resource('beli','BeliController');
    Route::get('cetak-dashboard','CetakController@cetakDashboard');
  });

});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cek-history', 'FrontController@cekHistory')->name('cekHistory');
Route::get('/cek-history/show', 'FrontController@showHistory');
