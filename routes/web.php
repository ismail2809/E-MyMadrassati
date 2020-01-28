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

Route::get('/1', function () {
    return view('layouts.master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inscription/new', 'InscriptionController@create');
Route::get('/inscriptions', 'InscriptionController@index');
Route::get('/inscription/{id}/edit','InscriptionController@edit');
Route::put('/inscription/{id}','InscriptionController@update');
Route::get('/inscription/{id}','InscriptionController@destroy');

Route::get('/année/new', 'AnnéeController@create');
Route::get('/années', 'AnnéeController@index');
Route::get('/année/{id}/edit','AnnéeController@edit');
Route::put('/année/{id}','AnnéeController@update');
Route::get('/année/{id}','AnnéeController@destroy');

Route::get('/classe/new', 'ClasseController@create');
Route::get('/classes', 'ClasseController@index');
Route::get('/classe/{id}/edit','ClasseController@edit');
Route::put('/classe/{id}','ClasseController@update');
Route::get('/classe/{id}','ClasseController@destroy');

Route::get('/cour/new', 'CourController@create');
Route::get('/cours', 'CourController@index');
Route::get('/cour/{id}/edit','CourController@edit');
Route::put('/cour/{id}','CourController@update');
Route::get('/cour/{id}','CourController@destroy');

Route::get('/matiere/new', 'MatiereController@create');
Route::get('/matieres', 'MatiereController@index');
Route::get('/matiere/{id}/edit','MatiereController@edit');
Route::put('/matiere/{id}','MatiereController@update');
Route::get('/matiere/{id}','MatiereController@destroy');

Route::get('/niveau/new', 'NiveauController@create');
Route::get('/niveaux', 'NiveauController@index');
Route::get('/niveau/{id}/edit','NiveauController@edit');
Route::put('/niveau/{id}','NiveauController@update');
Route::get('/niveau/{id}','NiveauController@destroy');

Route::get('/type/new', 'TypeController@create');
Route::get('/types', 'TypeController@index');
Route::get('/type/{id}/edit','TypeController@edit');
Route::put('/type/{id}','TypeController@update');
Route::get('/type/{id}','TypeController@destroy');