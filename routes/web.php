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


// Route::resource('/', 'TodolistsController');

Route::get('/', 'TodolistsController@index');
Route::post('/', 'TodolistsController@store');
Route::patch('/{todolist}', 'TodolistsController@update');
Route::delete('/{todolist}', 'TodolistsController@destroy');
Route::get('/about', function () {
    return redirect()->away('https://www.linkedin.com/in/andresuntoro');
});