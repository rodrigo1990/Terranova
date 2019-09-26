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
    return view('Admin/login');
});


Route::post('/admin/login', 'UserController@login');
Route::post('/admin/upload', 'UserController@upload');
Route::get('/admin/users', 'UserController@users');
Route::get('/admin/createProyecto', 'ProyectoController@createProyecto');

//Route::get('/admin/index', 'FrontController@index');

Route::get('/admin/index', function () {
    return view('Admin/login');
});


