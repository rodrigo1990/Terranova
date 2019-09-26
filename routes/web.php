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

Route::get('/admin/viewCreateProyecto', 'FrontController@viewCreateProyecto');
Route::get('/admin/viewListProyectos', 'FrontController@viewListProyectos');
Route::get('/admin/viewUpdateProyecto/{id}', 'FrontController@viewUpdateProyecto');

Route::post('/admin/login', 'UserController@login');
Route::get('/admin/users', 'UserController@users');


Route::post('/admin/createProyecto', 'ProyectoController@createProyecto');
Route::get('/admin/destroyProyecto/{id}', 'ProyectoController@destroyProyecto');
Route::get('/admin/updateProyecto/{id}', 'ProyectoController@viewUpdateProyecto');
Route::post('/admin/destroyImg/', 'ProyectoController@destroyImg');

//Route::get('/admin/index', 'FrontController@index');

Route::get('/admin/index', function () {
    return view('Admin/login');
});


