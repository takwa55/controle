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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
route::resource('/enquetes', 'EnquetesController');
route::resource('/wilayas', 'WilayasController');
route::get('/enquetesRapport/{id}', 'EnquetesRapportController@edit');
route::get('View_file/{n_pension}/{file_name}', 'EnquetesRapportController@open_file');
route::get('download/{n_pension}/{file_name}', 'EnquetesRapportController@get_file');
route::get('/wilayasRapport/{id}', 'WilayasRapportController@edit');
route::get('View_file/{n_pension}/{file_name}', 'WilayasRapportController@open_file');
route::get('download/{n_pension}/{file_name}', 'WilayasRapportController@get_file');
Route::get('/{page}', 'AdminController@index');



