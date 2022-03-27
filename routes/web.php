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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

	// rutas para roles
	Route::group(['prefix' => 'rol'], function () {
		Route::get('/', 'RolController@index')->name('rol');
		Route::get('/create', 'RolController@create')->name('rol.create');
		Route::post('/create', 'RolController@store')->name('rol.createss');
		Route::get('/delete/{rol}', 'RolController@destroy')->name('rol.delete');
		Route::get('/anular/{rol}', 'RolController@anular')->name('rol.anular');
		Route::get('/activar/{rol}', 'RolController@activar')->name('rol.activar');
		Route::get('/edit/{rol}', 'RolController@edit')->name('rol.edit');
		Route::put('/update/{rol}', 'RolController@update')->name('rol.update');
	});


    	// rutas para roles
		Route::group(['prefix' => 'user'], function () {
		Route::get('/', 'UserController@index')->name('user');
		Route::get('/create', 'UserController@create')->name('user.create');
		Route::post('/create', 'UserController@store')->name('user.create');
		Route::get('/delete/{user}', 'UserController@destroy')->name('user.delete');
		Route::get('/anular/{user}', 'UserController@anular')->name('user.anular');
		Route::get('/activar/{user}', 'UserController@activar')->name('user.activar');
		Route::get('/edit/{user}', 'UserController@edit')->name('user.edit');
		Route::put('/update/{user}', 'UserController@update')->name('user.update');
	});



	    	// rutas para categorias
			Route::group(['prefix' => 'categoria'], function () {
		Route::get('/', 'CategoriasController@index')->name('categoria');
		Route::get('/create', 'CategoriasController@create')->name('Categorias.create');

		Route::get('/delete/{producto}', 'CategoriasController@delete');



		Route::post('/create', 'CategoriasController@store')->name('categorias.create');

		Route::post('/save', 'CategoriasController@save');


		Route::get('/delete/{Categoria}', 'CategoriasController@destroy')->name('Categorias.delete');
		Route::get('/anular/{Categoria}', 'CategoriasController@anular')->name('Categorias.anular');
		Route::get('/activar/{Categoria}', 'CategoriasController@activar')->name('Categorias.activar');
		Route::get('/edit/{Categoria}', 'CategoriasController@edit')->name('Categorias.edit');
		Route::put('/update/{Categoria}', 'CategoriasController@update')->name('Categorias.update');
	});


	Route::group(['prefix' => 'ventas'], function () {
		Route::get('/', 'VentasController@index')->name('ventas');
		Route::post('/create', 'VentasController@create')->name('ventas.create');
	});




