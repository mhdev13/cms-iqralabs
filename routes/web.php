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
    return view('auth/login');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//route users
Route::get('/user','User@index');

Route::get('/user/export_excel', 'User@export_excel');

Route::get('/user/add','User@add');

Route::post('/user/store','User@store');

Route::get('/user/edit/{id}', 'User@edit');

Route::post('/user/update','User@update');

Route::get('/user/detail/{id}','User@detail');

Route::get('/user/delete/{id}','User@delete');

//route testimoni
Route::get('/testimoni','Testimoni@index');

Route::get('/testimoni/add', 'Testimoni@add');

Route::post('/testimoni/store', 'Testimoni@store');

Route::get('/testimoni/edit/{id}','Testimoni@edit');

Route::post('/testimoni/update','Testimoni@update');

Route::get('/testimoni/detail/{id}','Testimoni@detail');

Route::get('/testimoni/delete/{id}','Testimoni@delete');

//route faq
Route::get('/faq','Faq@index');

Route::get('/faq/create', 'Faq@create');

Route::post('/faq/store', 'Faq@store');

Route::get('/faq/edit/{id}','Faq@edit');

Route::post('/faq/update','Faq@update');

Route::get('/faq/detail/{id}','Faq@detail');

Route::get('/faq/destroy/{id}','Faq@destroy');

//route price
Route::get('/price','Price@index');

Route::get('/price/create', 'Price@create');

Route::post('/price/store', 'Price@store');

Route::get('/price/edit/{id}','Price@edit');

Route::post('/price/update','Price@update');

Route::get('/price/detail/{id}','Price@detail');

Route::get('/price/destroy/{id}','Price@destroy');

//route groups
Route::get('/group','Group@index');

Route::get('/group/add','Group@add');

Route::post('/group/store','Group@store');

Route::get('/group/edit/{id}', 'Group@edit');

Route::post('/group/update','Group@update');

Route::get('/group/detail/{id}','Group@detail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//--- API ---//

//route api users
Route::get('/user/getUser','User@getUser');

//route api testimoni
Route::get('/testimoni/getTestimoni','Testimoni@getTestimoni');

//route api faq
Route::get('/faq/getFaq','Faq@getFaq');

//route api price
Route::get('/price/getPrice','Price@getPrice');


// -- END --//
