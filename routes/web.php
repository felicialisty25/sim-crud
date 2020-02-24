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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard.index');
// });

Route::get('/', 'DashboardController@index');

Route::resource('sim', 'SimController');
Route::resource('kota', 'KotaController');
Route::resource('tempatPembuatan', 'TempatPembuatanController');

Route::get('/sim/pdf/{id}', 'SimController@export_pdf');
