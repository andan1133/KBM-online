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
    if (Auth::guest()) {
        return view('auth.login');
    } else {
        return redirect()->route('home.index');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['validation', 'auth']], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/create', 'UserController@create')->name('create');
    Route::post('/store', 'UserController@store')->name('store');
    Route::get('/show', 'UserController@show')->name('show');
    Route::get('/edit/{id}', 'UserController@edit')->name('edit');
    Route::post('/update/{id}', 'UserController@update')->name('update');
    Route::get('/delete/{id}', 'UserController@destroy')->name('delete');
});

Route::group(['prefix' => 'absen', 'as' => 'absen.'], function () {
    Route::get('/', 'AbsenController@index')->name('index')->middleware(['validation', 'auth']);
    Route::get('/create', 'AbsenController@create')->name('create')->middleware(['validation', 'auth']);
    Route::post('/store', 'AbsenController@store')->name('store')->middleware(['validation', 'auth']);
    Route::get('/show', 'AbsenController@show')->name('show')->middleware(['validation', 'auth']);
    Route::get('/edit/{id_absen}', 'AbsenController@edit')->name('edit');
    Route::post('/update/{id_absen}', 'AbsenController@update')->name('update');
    Route::get('/delete', 'AbsenController@delete')->name('delete')->middleware(['validation', 'auth']);
});

Route::group(['prefix' => 'jadwal', 'as' => 'jadwal.'], function () {
    Route::get('/', 'jadwalController@index')->name('index');
    Route::get('/create', 'jadwalController@create')->name('create')->middleware(['validation', 'auth']);
    Route::post('/store', 'jadwalController@store')->name('store')->middleware(['validation', 'auth']);
    Route::get('/show', 'jadwalController@show')->name('show')->middleware(['validation', 'auth']);
    Route::get('/edit', 'jadwalController@edit')->name('edit')->middleware(['validation', 'auth']);
    Route::get('/update/{id_absen}/{status}', 'jadwalController@update')->name('update')->middleware(['validation', 'auth']);
    Route::get('/delete/{id_jadwal}/{id_absen}', 'jadwalController@destroy')->name('delete')->middleware(['validation', 'auth']);
});

Route::group(['prefix' => 'kelas', 'as' => 'kelas.', 'middleware' => ['validation', 'auth']], function () {
    Route::get('/', 'KelasController@index')->name('index');
    Route::get('/create', 'KelasController@create')->name('create');
    Route::post('/store', 'KelasController@store')->name('store');
    Route::get('/show', 'KelasController@show')->name('show');
    Route::get('/edit/{id}', 'KelasController@edit')->name('edit');
    Route::post('/update/{id}', 'KelasController@update')->name('update');
    Route::get('/delete/{id}', 'KelasController@destroy')->name('delete');
});

Route::group(['prefix' => 'matapelajaran', 'as' => 'mp.', 'middleware' => ['validation', 'auth']], function () {
    Route::get('/', 'MataPelajaranController@index')->name('index');
    Route::get('/create', 'MataPelajaranController@create')->name('create');
    Route::post('/store', 'MataPelajaranController@store')->name('store');
    Route::get('/show', 'MataPelajaranController@show')->name('show');
    Route::get('/edit/{id}', 'MataPelajaranController@edit')->name('edit');
    Route::post('/update/{id}', 'MataPelajaranController@update')->name('update');
    Route::get('/delete/{id}', 'MataPelajaranController@destroy')->name('delete');
});
