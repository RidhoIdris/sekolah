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

    Route::get('/master-guru', 'MasterGuruController@index')->name('masterGuru');
    Route::get('/master-guru/show', 'MasterGuruController@show')->name('masterGuru.show');
    Route::get('/master-guru/edit/{nis}', 'MasterGuruController@edit');
    Route::put('/master-guru/update/{nis}', 'MasterGuruController@update');
    Route::post('/master-guru', 'MasterGuruController@store')->name('masterGuru.store');
    Route::delete('/master-guru/{nis}', 'MasterGuruController@delete')->name('masterGuru.delete');

    Route::get('/master-kelas', 'KelasController@index')->name('kelas.index');
    Route::get('/master-kelas/show', 'KelasController@show')->name('kelas.show');
    Route::get('/master-kelas/edit/{kode_kelas}', 'KelasController@edit')->name('kelas.edit');
    Route::put('/master-kelas/update/{kode_kelas}', 'KelasController@update')->name('kelas.update');
    Route::post('/master-kelas', 'KelasController@store')->name('kelas.store');
    Route::delete('/master-kelas/{kode_kelas}', 'KelasController@delete')->name('kelas.delete');

    Route::get('/master-jurusan', 'JurusanController@index')->name('jurusan.index');
    Route::get('/master-jurusan/show', 'JurusanController@show')->name('jurusan.show');
    Route::get('/master-jurusan/edit/{id}', 'JurusanController@edit')->name('jurusan.edit');
    Route::put('/master-jurusan/update/{id}', 'JurusanController@update')->name('jurusan.update');
    Route::post('/master-jurusan', 'JurusanController@store')->name('jurusan.store');
    Route::delete('/master-jurusan/{id}', 'JurusanController@delete')->name('jurusan.delete');

    Route::get('/master-mapel', 'MasterMapelController@index')->name('mapel.index');
    Route::get('/master-mapel/show', 'MasterMapelController@show')->name('mapel.show');
    Route::get('/master-mapel/edit/{id}', 'MasterMapelController@edit')->name('mapel.edit');
    Route::put('/master-mapel/update/{id}', 'MasterMapelController@update')->name('mapel.update');
    Route::post('/master-mapel', 'MasterMapelController@store')->name('mapel.store');
    Route::delete('/master-mapel/{id}', 'MasterMapelController@delete')->name('mapel.delete');
});


