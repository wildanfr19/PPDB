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
Route::get('create-admin',function(){
    \DB::table('users')->insert([
        'role'=>1,
        'name'=>'admin',
        'nisn'=>'1',
        'email'=>'admin@gmail.com',
        'id_registrasi'=>'-',
        'password'=>bcrypt('123456')
    ]);
});
Route::get('/', function () {
	return view('welcome');
});

Route::get('keluar', function () {
	\Auth::logout();
	return redirect('/');
});


Route::get('ppdb','Ppdb_Controller@index')->name('ppdb.index');
Route::post('ppdb','Ppdb_Controller@store')->name('ppdb.store');
Auth::routes();

Route::group(['middleware' => 'auth'], function() {


	Route::get('dashboard','Dashboard\BerandaController@index')->name('dashboard.index');
	Route::get('cetak','Dashboard\BiodataController@cetak')->name('cetak.exportpdf');
	Route::get('biodata','Dashboard\BiodataController@index')->name('biodata.index');
	Route::post('biodata/{param}','Dashboard\BiodataController@store')->name('biodata.store');
	Route::put('biodata/{param}','Dashboard\BiodataController@update')->name('biodata.update');

	Route::get('verifikasi','Dashboard\VerifikasiController@index')->name('verifikasi.index');
	Route::post('verifikasi','Dashboard\VerifikasiController@store')->name('verifikasi.store');
	Route::get('verifikasi/peserta','Dashboard\VerifikasiController@diverifikasi')->name('verifikasi.diverifikasi');

	Route::get('data_peserta','Dashboard\PesertaController@index')->name('peserta.index');
	Route::get('peserta/verifikasi','Dashboard\PesertaController@diverifikasi')->name('peserta.diverifikasi');
	Route::get('peserta/belum-verifikasi','Dashboard\PesertaController@belom_verifikasi')->name('peserta.belom_verifikasi');

	Route::get('peserta/{param}','Dashboard\PesertaController@edit')->name('peserta.edit');
	Route::put('peserta/{param}','Dashboard\PesertaController@update')->name('peserta.update');
	Route::delete('peserta/{param}','Dashboard\PesertaController@delete')->name('peserta.delete');
	Route::get('peserta/{param}/luluskan','Dashboard\PesertaController@luluskan')->name('peserta.luluskan');

	Route::get('profile_sekolah','Dashboard\ProfileController@index')->name('profile.index');
	Route::put('biodata','Dashboard\ProfileController@update')->name('profile.update');

	Route::get('pesan','Dashboard\PesanController@index')->name('pesan.index');
	Route::get('pesan/add','Dashboard\PesanController@add')->name('pesan.add');
	Route::post('pesan/add','Dashboard\PesanController@store')->name('pesan.store');
	Route::get('pesan/{param}','Dashboard\PesanController@detail')->name('pesan.detail');
});

Route::get('/home', 'HomeController@index')->name('home');
