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

//route users
Route::get('/user','User@index');

Route::get('/user/add','User@add');

Route::post('/user/store','User@store');

Route::get('/user/edit/{id}', 'User@edit');

Route::post('/user/update','User@update');

Route::get('/user/detail/{id}','User@detail');

//route groups
Route::get('/group','Group@index');

Route::get('/group/add','Group@add');

Route::post('/group/store','Group@store');

Route::get('/group/edit/{id}', 'Group@edit');

Route::post('/group/update','Group@update');

Route::get('/group/detail/{id}','Group@detail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');