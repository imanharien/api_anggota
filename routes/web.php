<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'api'], function() use($router){
	//register
	$router->post('register', 'AuthController@register');
	//login
	$router->post('login', 'AuthController@login');
	//logout
	$router->post('logout', 'AuthController@logout');
	//route crud anggota
	$router->get('/anggota', 'AnggotaController@index');
	$router->get('/anggota/{id}', 'AnggotaController@show');
	$router->post('/anggota/save', 'AnggotaController@store');
	$router->post('/anggota/update/{id}', 'AnggotaController@update');
	$router->post('/anggota/delete/{id}', 'AnggotaController@destroy');

	//route crud departemen
	$router->get('/dept', 'DepartemenController@index');
	$router->get('/dept/{id}', 'DepartemenController@show');
	$router->post('/dept/save', 'DepartemenController@store');
	$router->post('/dept/update/{id}', 'DepartemenController@update');
	$router->post('/dept/delete/{id}', 'DepartemenController@destroy');

	//route crud kegiatan
	$router->get('/kegiatan', 'KegiatanController@index');
	$router->get('/kegiatan/{id}', 'KegiatanController@show');
	$router->post('/kegiatan/save', 'KegiatanController@store');
	$router->post('/kegiatan/update/{id}', 'KegiatanController@update');
	$router->post('/kegiatan/delete/{id}', 'KegiatanController@destroy');

	//route crud peserta kegiatan
	$router->get('/peserta-kegiatan', 'PesertaKegiatanController@index');
	$router->get('/peserta-kegiatan/{id}', 'PesertaKegiatanController@show');
	$router->post('/peserta-kegiatan/save', 'PesertaKegiatanController@store');
	$router->post('/peserta-kegiatan/update/{id}', 'PesertaKegiatanController@update');
	$router->post('/peserta-kegiatan/delete/{id}', 'PesertaKegiatanController@destroy');
});
