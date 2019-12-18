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
    return view('partial/main');
})->name('home');
Auth::routes();
Route::get('/donatur', 'Donatur\DonaturController@index')->name('donatur')->middleware('isDonatur');
Route::get('/powner', 'Powner\PownerController@index')->name('powner')->middleware('isPowner');

$main_admin_routes = function(){
    Route::get('/', 'Admin\AdminController@index')->name('admin');

    //Provinsi
    Route::get('/provinsi', 'Admin\ProvinsiController@index')->name('admin.provinsi');
    Route::get('/provinsi/json', 'Admin\ProvinsiController@json')->name('admin.provinsi.json');
    Route::get('/provinsi/create', 'Admin\ProvinsiController@create')->name('admin.provinsi.create');
    Route::post('/provinsi', 'Admin\ProvinsiController@store')->name('admin.provinsi.store');
    Route::get('/provinsi/{id}/edit', 'Admin\ProvinsiController@edit')->name('admin.provinsi.edit');
    Route::put('/provinsi/{id}/edit', 'Admin\ProvinsiController@update')->name('admin.provinsi.update');
    Route::get('/provinsi/{id}', 'Admin\ProvinsiController@destroy')->name('admin.provinsi.destroy');
    
    //Kabupaten
    Route::get('/kabupaten', 'Admin\KabupatenController@index')->name('admin.kabupaten');
    Route::get('/kabupaten/json', 'Admin\KabupatenController@json')->name('admin.kabupaten.json');
    Route::get('/kabupaten/create', 'Admin\KabupatenController@create')->name('admin.kabupaten.create');
    Route::post('/kabupaten', 'Admin\KabupatenController@store')->name('admin.kabupaten.store');
    Route::get('/kabupaten/{id}/edit', 'Admin\KabupatenController@edit')->name('admin.kabupaten.edit');
    Route::put('/kabupaten/{id}/edit', 'Admin\KabupatenController@update')->name('admin.kabupaten.update');
    Route::get('/kabupaten/{id}', 'Admin\KabupatenController@destroy')->name('admin.kabupaten.destroy');
    
    //Kecamatan 
    Route::get('/kecamatan', 'Admin\KecamatanController@index')->name('admin.kecamatan');
    Route::get('/kecamatan/create', 'Admin\KecamatanController@create')->name('admin.kecamatan.create');
    Route::post('/kecamatan', 'Admin\KecamatanController@store')->name('admin.kecamatan.store');
    Route::get('/kecamatan/{id}/edit', 'Admin\KecamatanController@edit')->name('admin.kecamatan.edit');
    Route::put('/kecamatan/{id}/edit', 'Admin\KecamatanController@update')->name('admin.kecamatan.update');
    Route::get('/kecamatan/{id}', 'Admin\KecamatanController@destroy')->name('admin.kecamatan.destroy');
};
Route::group(['middleware' => 'isAdmin', 'prefix'=>'admin'], $main_admin_routes);