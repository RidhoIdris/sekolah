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
    Route::post('/master-siswa', 'MasterSiswaController@store')->name('masterSiswa.store');
});


