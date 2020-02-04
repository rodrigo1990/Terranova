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


Route::get('/config-cache', function () {
    Artisan::call('config:cache', []);

    //
});


Route::get('/', 'FrontController@index');

Route::get('/testimonios', 'FrontController@testimonios');
Route::get('/preguntas-frecuentes', 'FrontController@preguntasFrecuentes');
Route::get('/proyectos', 'FrontController@buscador');
Route::post('/enviarFormulario', 'MailController@enviarFormulario');

Route::post('/buscarBarrioSegunZona', 'BuscadorController@buscarBarrioSegunZona');




/*ADMIN*/


Route::get('/admin/viewCreateProyecto', 'admin\FrontController@viewCreateProyecto');
Route::get('/admin/viewListProyectos/{msg}', 'admin\FrontController@viewListProyectos');
Route::get('/admin/viewUpdateProyecto/{id}', 'admin\FrontController@viewUpdateProyecto');

Route::get('/admin/viewCreateTestimonio', 'admin\FrontController@viewCreateTestimonio');
Route::get('/admin/viewListTestimonios/{msg}', 'admin\FrontController@viewListTestimonios');
Route::get('/admin/viewUpdateTestimonio/{id}', 'admin\FrontController@viewUpdateTestimonio');

Route::get('/admin/viewCreateNovedad', 'admin\FrontController@viewCreateNovedad');
Route::get('/admin/viewListNovedades/{msg}', 'admin\FrontController@viewListNovedades');
Route::get('/admin/viewUpdateNovedad/{id}', 'admin\FrontController@viewUpdateNovedad');



Route::post('/admin/login', 'admin\UserController@login');
Route::post('/admin/logout', 'admin\UserController@logout');
Route::get('/admin/users', 'admin\UserController@users');


Route::post('/admin/createProyecto', 'admin\ProyectoController@createProyecto');
Route::get('/admin/destroyProyecto/{id}', 'admin\ProyectoController@destroyProyecto');
Route::get('/admin/updateProyecto/{id}', 'admin\ProyectoController@viewUpdateProyecto');
Route::post('/admin/destroyImgProyecto/', 'admin\ProyectoController@destroyImg');
Route::post('/admin/updateProyecto/', 'admin\ProyectoController@updateProyecto');



Route::get('/admin/pruebaString', 'admin\TestimonioController@pruebaString');
Route::post('/admin/createTestimonio', 'admin\TestimonioController@createTestimonio');
Route::get('/admin/destroyTestimonio/{id}', 'admin\TestimonioController@destroyTestimonio');
Route::post('/admin/updateTestimonio', 'admin\TestimonioController@updateTestimonio');
Route::post('/admin/destroyImgTestimonio/', 'admin\TestimonioController@destroyImg');


Route::post('/admin/createNovedad', 'admin\NovedadController@createNovedad');
Route::get('/admin/destroyNovedad/{id}', 'admin\NovedadController@destroyNovedad');
Route::post('/admin/updateNovedad', 'admin\NovedadController@updateNovedad');
Route::post('/admin/destroyImgNovedad/', 'admin\NovedadController@destroyImg');


Route::post('/admin/destroyMasterplan', 'admin\ProyectoController@destroyMasterplan');







//Route::get('/admin/index', 'FrontController@index');

Route::get('/panel/', function () {
    return view('Admin/login');
});


