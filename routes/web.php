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
})->name('home');
Auth::routes();
Route::get('/logout', 'Admin\AdminController@logout');
Route::get('/donatur', 'Donatur\DonaturController@index')->name('donatur')->middleware('isDonatur');
Route::get('/powner', 'Powner\PownerController@index')->name('powner')->middleware('isPowner');

$main_admin_routes = function(){
    Route::get('/', 'Admin\AdminController@index')->name('admin');

    //Provinsi
    Route::resource('/provinsi', 'Admin\ProvinsiController');
    Route::get('/json/provinsi', 'Admin\ProvinsiController@jsonProvinsi')->name('json/provinsi');
    
    //Kabupaten
    Route::resource('/kabupaten', 'Admin\KabupatenController');
    Route::get('/json/kabupaten', 'Admin\KabupatenController@jsonKabupaten')->name('json/kabupaten');
    
    //Kecamatan
    Route::resource('/kecamatan', 'Admin\KecamatanController');
    Route::get('/json/kecamatan', 'Admin\KecamatanController@jsonKecamatan')->name('json/kecamatan');
    Route::get('/get_kabupaten/kecamatan', 'Admin\KecamatanController@getKabupaten')->name('get_kabupaten/kecamatan');

    //Kelurahan
    Route::resource('/kelurahan', 'Admin\KelurahanController');
    Route::get('/json/kelurahan', 'Admin\KelurahanController@jsonKelurahan')->name('json/kelurahan');
    Route::get('/get_kabupaten/kelurahan', 'Admin\KelurahanController@getKabupaten')->name('get_kabupaten/kelurahan');
    Route::get('/get_kecamatan/kelurahan', 'Admin\KelurahanController@getKecamatan')->name('get_kecamatan/kelurahan');
};
Route::group(['middleware' => 'isAdmin', 'prefix'=>'admin'], $main_admin_routes);