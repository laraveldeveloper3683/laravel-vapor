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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/insert-data','DataController@index');
Route::post('/insert-data','DataController@store');


Route::get('/user-enable/{id}','UserController@enableUser');
Route::get('/user-disable/{id}','UserController@disableUser');
Route::resource('users','UserController');
Route::resource('runs','RunController');
