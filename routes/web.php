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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// jurusan
Route::get('/jurusan', 'JurusanController@index');
Route::post('/jurusan/add', 'JurusanController@create');
Route::post('/jurusan/edit/{id}', 'JurusanController@update');
Route::post('/jurusan/delete/{id}', 'JurusanController@delete');

// kelas
Route::get('/kelas', 'KelasController@index');
Route::post('/kelas/add', 'KelasController@add');
Route::post('/kelas/edit/{id}', 'KelasController@update');
Route::post('/kelas/delete/{id}', 'KelasController@delete');

// matpel
Route::get('/matpel', 'MatpelController@index');
Route::post('/matpel/add', 'MatpelController@create');
Route::post('/matpel/update/{id}', 'MatpelController@update');
Route::post('/matpel/delete/{id}', 'MatpelController@delete');

//guru
Route::get('/guru', 'GuruController@index');
Route::post('/guru/add', 'GuruController@create');
Route::post('/guru/edit/{id}', 'GuruController@update');
Route::post('/guru/delete/{id}', 'GuruController@delete');