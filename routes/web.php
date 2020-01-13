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

Route::get('/show_url', ['as' => 'show_url', 'uses' => 'TestController@showUrl']);
Route::get('/show_form', ['as' => 'show_form', 'uses' => 'TestController@showForm']);
Route::post('/access_url', ['as' => 'access_url', 'uses' => 'TestController@accessUrl']);
Route::post('/submit_form', ['as' => 'submit_form', 'uses' => 'TestController@submitForm']);