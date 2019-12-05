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
Route::get('/donatur', 'DonaturController@index')->name('donatur')->middleware('isDonatur');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('isAdmin');
Route::get('/powner', 'PownerController@index')->name('powner')->middleware('isPowner');
// Route::get('/home', 'HomeController@index')->name('home');
