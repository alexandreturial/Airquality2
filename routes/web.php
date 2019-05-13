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
    return view('welcome');
});
Route::get('/teste','GraficoController@ultimosdados');
Route::post('/grafico', 'GraficoController@teste');
Route::get('/chart', function () {
    return view('charts');
});

Route::post('/chart','GraficoController@ultimosdados')->name('chartz');