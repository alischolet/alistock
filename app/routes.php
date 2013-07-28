<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('accueil');
});


Route::resource('donateurs', 'DonateursController');

Route::resource('fabricants', 'FabricantsController');

Route::resource('modeles', 'ModelesController');

Route::resource('materiels', 'MaterielsController');

Route::resource('typemateriels', 'TypematerielsController');

Route::resource('unites', 'UnitesController');

Route::resource('typemateriels', 'TypematerielsController');