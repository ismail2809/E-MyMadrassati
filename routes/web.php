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



Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/updateprofile', function () {
    return view('user.updateprofile');
});
/*
Route::get('/payment/new', function () {
    return view('payment.new');
});

Route::get('/payments', function () {
    return view('payment.index');
});
*/
Route::get('/absences', function () {
    return view('absence.index');
});

Route::get('/absences/classe', function () {
    return view('absence.classe');
});

Route::get('/absences/tous', function () {
    return view('absence.listes');
});

/*Route::get('/payment/id_inscription', function () {
    return view('payment.insert');
});*/
 
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/', function () {
    	return view('dashboard.dashboard');
});

Route::get('/notes', function () {
    return view('note.index');
});

Route::get('/notes/classe', function () {
    return view('note.classe');
});
Route::get('/notes/etudiant', function () {
    return view('note.note_etudiant');
});

Route::get('/notes/etudiant/new', function () {
    return view('note.new');
});

Route::get('/notes/etudiant/edit', function () {
    return view('note.edit');
});

Route::get('/notes/listes', function () {
    return view('note.listes');
});

Route::get('/Demandesdocuments/nouvelle', function () {
    return view('demandedocument.new');
});

Route::get('/Demandesdocuments', function () {
    return view('demandedocument.listes');
});

Route::get('/timeline', function () {
    return view('reseau.timeline');
});


Route::get('events', 'EventController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//inscriptions
Route::get('/inscription/new', 'InscriptionController@create'); 
Route::get('/inscriptions', 'InscriptionController@index');
Route::post('/inscription', 'InscriptionController@store');
Route::get('/inscription/{id}/edit','InscriptionController@edit');
Route::put('/inscription/{id}','InscriptionController@update');
Route::get('/inscription/{id}','InscriptionController@destroy');
Route::get('/inscription/{id}','InscriptionController@show');

//payments
Route::get('/payment/new', 'PaymentController@create');
Route::get('/payment/add/{id}', 'PaymentController@form_payment');
Route::get('/payment/{id}/détail', 'PaymentController@show');
Route::get('/payments', 'PaymentController@index');
Route::post('/payment', 'PaymentController@store');
Route::get('/payment/{id}/edit','PaymentController@edit');
Route::put('/payment/{id}','PaymentController@update');
Route::get('/payment/{id}','PaymentController@destroy');

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


 