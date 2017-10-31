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

Route::get('/', 'HomeController@getHome');

//Route::get('login', function () {
//    return view ('auth.login');
//});

//Route::get('logout', function () {
//    return ('Logout usuario');
//});

Route::get('catalog', [
    'middleware' => 'auth',
    'uses' => 'CatalogController@getIndex'
]);

Route::get('catalog/show/{id}', [
    'middleware' => 'auth',
    'uses' => 'CatalogController@getShow'
]);

Route::get('catalog/create', [
    'middleware' => 'auth',
    'uses' => 'CatalogController@getCreate'
]);

Route::get('catalog/edit/{id}', [
    'middleware' => 'auth',
    'uses' => 'CatalogController@getEdit'
]); 

Route::post('catalog/create', [
    'middleware' => 'auth',
    'uses' => 'CatalogController@postCreate'
]);

Route::put('catalog/edit/{id}', [
    'middleware' => 'auth',
    'uses' => 'CatalogController@putEdit'
]);

//ruta para rentar la peicula
Route::put('/catalog/rent/{id}', [
    'middleware' => 'auth',
    'uses' => 'CatalogController@putRent'
]);

Route::put('catalog/return/id/{id}', [
    'middleware' => 'auth',
    'uses' => 'CatalogController@putReturn'
]); 

Route::delete('/catalog/delete/{id}', [
    'middleware' => 'auth',
    'uses' => 'CatalogController@deleteMovie'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');