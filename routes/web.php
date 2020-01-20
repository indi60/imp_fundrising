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
//Home
Route::get('/', 'HomeController@index')->name('home');
Route::get('/{id}/show', 'HomeController@show');

Auth::routes();
Route::get('/logout', 'Admin\AdminController@logout');

// Register
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::get('/get_kabupaten', 'Auth\RegisterController@getKabupaten')->name('get_kabupaten');
Route::get('/get_kecamatan', 'Auth\RegisterController@getKecamatan')->name('get_kecamatan');
Route::get('/get_kelurahan', 'Auth\RegisterController@getKelurahan')->name('get_kelurahan');

$main_admin_routes = function(){
    Route::resource('/', 'Admin\AdminController');

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

    //KategoriProject
    Route::resource('/kategoriproject', 'Admin\KategoriProjectController');
    Route::get('/json/kategoriproject', 'Admin\KategoriProjectController@jsonKategoriProject')->name('json/kategoriproject');
    
    //listdonatur OWNER PROJECT
    Route::resource('/list_owner_project', 'Admin\ListOwnerProjectController');
    Route::get('/json/list_owner_project', 'Admin\ListOwnerProjectController@jsonListProject')->name('json/list_owner_project');

    //Upload Image CKEditor
    Route::post('/upload', 'Admin\ListOwnerProjectController@upload')->name('ckeditor/uploadd');

    //RefBank
    Route::resource('/refbank', 'Admin\RefBankController');
    Route::get('/json/refbank', 'Admin\RefBankController@jsonRefBank')->name('json/refbank');

    //List Donatur
    Route::resource('/list_donatur', 'Admin\ListDonaturController');
    Route::get('/json/listdonatur', 'Admin\ListDonaturController@jsonListDonatur')->name('json/listdonatur');
};
Route::group(['middleware' => 'isAdmin', 'prefix'=>'admin'], $main_admin_routes);

$main_powner_routes = function(){
    Route::resource('/', 'Powner\PownerController');

    //CreateProject
    Route::resource('/create_project', 'Powner\CreateProjectController');
    Route::get('/json/cproject', 'Powner\CreateProjectController@jsonCProject')->name('json/cproject');

    //Upload Image CKEditor
    Route::post('/upload', 'Powner\CreateProjectController@upload')->name('ckeditor/upload');
};
Route::group(['middleware' => 'isPowner', 'prefix'=>'powner'], $main_powner_routes);

$main_donatur_routes = function(){
    Route::resource('/', 'Donatur\DonaturController');
    
    //Lihat Project
    Route::resource('/lihat_project', 'Donatur\LihatProjectController');
    //get
    Route::get('/projectCat', 'Donatur\LihatProjectController@projectCat')->name('projectCat');

    //Donasi Project
    Route::resource('/donasi_project', 'Donatur\DonasiProjectController');
    Route::get('/json/dproject', 'Donatur\DonasiProjectController@jsonDProject')->name('json/dproject');
    


};
Route::group(['middleware' => 'isDonatur', 'prefix'=>'donatur'], $main_donatur_routes);
