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
Route::get('/admin/viewListProyectos/{msg}', 'FrontController@viewListProyectos');
Route::get('/admin/viewUpdateProyecto/{id}', 'FrontController@viewUpdateProyecto');

Route::get('/admin/viewCreateTestimonio', 'FrontController@viewCreateTestimonio');
Route::get('/admin/viewListTestimonios/{msg}', 'FrontController@viewListTestimonios');
Route::get('/admin/viewUpdateTestimonio/{id}', 'FrontController@viewUpdateTestimonio');

Route::get('/admin/viewCreateNovedad', 'FrontController@viewCreateNovedad');
Route::get('/admin/viewListNovedades/{msg}', 'FrontController@viewListNovedades');
Route::get('/admin/viewUpdateNovedad/{id}', 'FrontController@viewUpdateNovedad');



Route::post('/admin/login', 'UserController@login');
Route::post('/admin/logout', 'UserController@logout');
Route::get('/admin/users', 'UserController@users');


Route::post('/admin/createProyecto', 'ProyectoController@createProyecto');
Route::get('/admin/destroyProyecto/{id}', 'ProyectoController@destroyProyecto');
Route::get('/admin/updateProyecto/{id}', 'ProyectoController@viewUpdateProyecto');
Route::post('/admin/destroyImgProyecto/', 'ProyectoController@destroyImg');
Route::post('/admin/updateProyecto/', 'ProyectoController@updateProyecto');



Route::get('/admin/pruebaString', 'TestimonioController@pruebaString');
Route::post('/admin/createTestimonio', 'TestimonioController@createTestimonio');
Route::get('/admin/destroyTestimonio/{id}', 'TestimonioController@destroyTestimonio');
Route::post('/admin/updateTestimonio', 'TestimonioController@updateTestimonio');
Route::post('/admin/destroyImgTestimonio/', 'TestimonioController@destroyImg');


Route::post('/admin/createNovedad', 'NovedadController@createNovedad');
Route::get('/admin/destroyNovedad/{id}', 'NovedadController@destroyNovedad');
Route::post('/admin/updateNovedad', 'NovedadController@updateNovedad');
Route::post('/admin/destroyImgNovedad/', 'NovedadController@destroyImg');







//Route::get('/admin/index', 'FrontController@index');

Route::get('/admin/index', function () {
    return view('Admin/login');
});


