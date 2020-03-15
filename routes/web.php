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

//route product
Route::get('/product','Product@index');
Route::get('/product/add','Product@add');
Route::post('/product/store','Product@store');
Route::get('/product/detail/{id}','Product@detail');
Route::post('/product/update', 'Product@update');
Route::get('/product/hapus/{id}', 'Product@hapus');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
