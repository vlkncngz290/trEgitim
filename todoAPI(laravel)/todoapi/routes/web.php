<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/sign_in/{mail}/{pass}','login@sign_in'); //OK
Route::get('/adduser/{mail}/{pass}/{company}/{level}','login@sign_up'); //OK

Route::get('/list_all_todo/{mail}','todolist@listAllTodo'); //OK
Route::get('/newtodo/{creator_mail}/{assigned_mail}/{title}/{content}/{deadline}','todolist@newTodo'); //OK
Route::get('/donetodo/{id}','todolist@doneTodo');

Route::get('/undonetodo/{id}','oldtodo@undoneTodo'); //OK
Route::get('/list_all_undonetodo/{mail}','oldtodo@listUndoneTodo'); //OK


