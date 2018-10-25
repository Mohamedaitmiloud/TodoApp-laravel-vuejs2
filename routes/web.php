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

// index view
Route::get('/todo','TodoController@index');
//fetching user data - all user todos items
Route::get('/getdata','TodoController@getData');
//add a new todo item
Route::post('/addTodo','TodoController@addTodo');
//marking a todo item completed
Route::put('/markcompleted/{id}','TodoController@markCompleted');
//deleting a todo item
Route::delete('/deleteTodo/{id}','TodoController@deleteTodo');
//change name
Route::put('/changeName','TodoController@changeName');




Route::get('/home', 'HomeController@index')->name('home');
