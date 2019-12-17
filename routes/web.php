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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
});

Route::group(['prefix' => 'operator'], function(){
    Route::get('/', 'Operator\DashboardController@index')->name('operator.dashboard');
});

Route::group(['prefix' => 'operator/manajemen_investor'], function(){
    Route::get('/', 'Operator\FormPembukaanRekening@index')->name('operator.form_pembukaan_rekening');
    Route::get('tambah_investor','Operator\FormPembukaanRekening@tambahInvestor')->name('operator.tambah_investor');
    Route::post('/','Operator\FormPembukaanRekening@tambahInvestorPost')->name('operator.tambah_investor_post');

});

Route::group(['prefix' => 'operator/manajemen_saham'], function(){
    Route::get('/', 'Operator\SahamInvestorController@index')->name('operator.manajemen_saham');
    Route::get('/tambah_saham', 'Operator\SahamInvestorController@tambahSaham')->name('operator.tambah_saham');
    Route::post('/','Operator\SahamInvestorController@tambahSahamPost')->name('operator.tambah_saham_post');

});

Route::get('/home', 'HomeController@index')->name('home');
