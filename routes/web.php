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

Route::get('/product/edit/{id}', 'Product@edit');

Route::post('/product/update','Product@update');

Route::get('/product/detail/{id}','Product@detail');

Route::get('/product/delete/{id}', 'Product@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Restfull API
Route::get('/contacts','ControllerContact@index');

