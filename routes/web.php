<?php

use Illuminate\Support\Facades\Route;

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

// Route Login
Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/login', 'AuthController@login')->name('login');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('home.index');
    })->name('home');

    // route Mahasiswa
    Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa.index');
    Route::get('/mahasiswa/create', 'MahasiswaController@create')->name('mahasiswa.create');
    Route::post('/mahasiswa/upload', 'MahasiswaController@upload')->name('mahasiswa.upload');
    Route::get('/mahasiswa/{mahasiswa}/edit', 'MahasiswaController@edit');
    Route::post('/mahasiswa', 'MahasiswaController@store');
    Route::patch('/mahasiswa/{mahasiswa}', 'MahasiswaController@update');
    Route::delete('/mahasiswa/{mahasiswa}', 'MahasiswaController@destroy');

    // route Mata Kuliah
    Route::get('/matkul', 'MataKuliahController@index');
    Route::get('/matkul/create', 'MataKuliahController@create');
    Route::get('/matkul/{mataKuliah}/edit', 'MataKuliahController@edit');
    Route::post('/matkul', 'MataKuliahController@store');
    Route::post('/matkul/upload', 'MataKuliahController@upload');
    Route::patch('/matkul/{mataKuliah}', 'MataKuliahController@update');
    Route::delete('/matkul/{mataKuliah}', 'MataKuliahController@destroy');

    // Route Nilai
    Route::prefix('nilai')->group(function() {
        Route::get('/', 'NilaiController@index');
        Route::get('/create', 'NilaiController@create');
        Route::post('/', 'NilaiController@store');
        Route::post('/upload-nilai', 'NilaiController@upload');
    });

    Route::get('/report', 'ReportController@index');
    Route::post('report/cari-khs', 'ReportController@tampilNilai');
    Route::post('report/cari-transkip', 'ReportController@tampilTranskip');
    Route::get('report/khs-excel/{nim}/{semester}', 'ReportController@exportKhs');
    Route::get('report/khs-pdf/{nim}/{semester}', 'ReportController@PdfKhs');

    // Route User
    Route::get('/user', 'UserController@index');
    Route::get('/user/create', 'UserController@create');
    Route::post('/user', 'UserController@store');
    Route::delete('/user/{user}', 'UserController@destroy');
});


