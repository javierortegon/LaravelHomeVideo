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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
