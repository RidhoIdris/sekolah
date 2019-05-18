<?php

Auth::routes();

Route::middleware('guest')->group(function(){
	Route::get('/login', 'LoginController@index');
    Route::POST('/login', 'LoginController@login')->name('login');
    Route::get('/register', 'LoginController@register');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::POST('/logout', 'LoginController@logout')->name('logout');

    Route::get('/master-siswa', 'MasterSiswaController@index')->name('masterSiswa');
    Route::get('/master-siswa/show', 'MasterSiswaController@show')->name('masterSiswa.show');
    Route::get('/master-siswa/edit/{nis}', 'MasterSiswaController@edit');
    Route::put('/master-siswa/update/{nis}', 'MasterSiswaController@update');
    Route::post('/master-siswa', 'MasterSiswaController@store')->name('masterSiswa.store');
    Route::delete('/master-siswa/{nis}', 'MasterSiswaController@delete')->name('masterSiswa.delete');

    Route::get('/master-kelas', 'KelasController@index')->name('kelas.index');
    Route::get('/master-kelas/show', 'KelasController@show')->name('kelas.show');
    Route::get('/master-kelas/edit/{kode_kelas}', 'KelasController@edit')->name('kelas.edit');
    Route::put('/master-kelas/update/{kode_kelas}', 'KelasController@update')->name('kelas.update');
    Route::post('/master-kelas', 'KelasController@store')->name('kelas.store');
    Route::delete('/master-kelas/{kode_kelas}', 'KelasController@delete')->name('kelas.delete');
});


