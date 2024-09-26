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

//ルート定義 ->name('ルート名')で名前付きルート

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', 'TodoController@index')->name('todo.index');
Route::get('/tasks/create', 'TodoController@create')->name('todo.create');
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');

Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');

Route::post('/todo', 'TodoController@store')->name('todo.store');

