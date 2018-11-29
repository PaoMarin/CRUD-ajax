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

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('client','ClientController');
Route::get('/client/{id}/delete', 'ClientController@delete');
Route::get('list_clients','ClientController@index_clients');
Route::get('/view_clients/{id}','ClientController@getClients');
Route::get('/client/create', 'ClientController@create');
