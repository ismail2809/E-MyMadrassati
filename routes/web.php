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
 
/*Route::get('/emploi', function () {
    return view('emploi.calendar');
}); */
Route::get('/emploi', 'UserController@event');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//landing page
Route::get('/', function () {
    	return view('landing_page.index');
});

Route::get('events', 'EventController@index');
Route::post('event', 'EventController@store');

//tableau de bord
Route::get('/dashboard', 'UserController@getUsers');

//timeline
Route::get('/timeline', 'BlogController@index');
Route::post('/timeline', 'BlogController@store');
Route::get('/timelines', 'BlogController@listeBlog');

//profile
Route::get('/profile', 'UserController@profile');
Route::post('/updateprofile', 'UserController@update_profile');
Route::get('/editprofile', 'UserController@editprofile');

//inscriptions
Route::get('/inscription/new', 'InscriptionController@create'); 
Route::get('/inscriptions', 'InscriptionController@index');
Route::post('/inscription', 'InscriptionController@store');
Route::get('/inscription/{id}/edit','InscriptionController@edit');
Route::put('/inscription/{id}','InscriptionController@update');
Route::delete('/inscription/{id}','InscriptionController@destroy');
Route::get('/inscription/{id}','InscriptionController@show');
Route::get('/inscription/renouveler/{id}', 'InscriptionController@create_renouveler'); 
Route::post('/inscription/renouveler', 'InscriptionController@update_renouveler')->name('inscription_renouveler'); 
Route::post('/inscription/search', 'InscriptionController@search_inscription'); 

//payments
Route::get('/payment/new', 'PaymentController@create');
Route::get('/payment/add/{id}', 'PaymentController@form_payment');
Route::get('/payment/{id}/détail', 'PaymentController@show');
Route::get('/payments', 'PaymentController@index');
Route::post('/payment', 'PaymentController@store');
Route::get('/payment/{id}/edit','PaymentController@edit');
Route::put('/payment/{id}','PaymentController@update');
Route::get('/payment/{id}','PaymentController@destroy');
Route::get('/payments/etudiants', 'PaymentController@getPaymentsEtudiantEp');

//absences
Route::get('/absence/new', 'AbsenceController@create');
Route::post('/absence/search', 'AbsenceController@form_search');
Route::get('/absence/classe', 'AbsenceController@classe');
Route::post('/absence', 'AbsenceController@store');
Route::get('/absences', 'AbsenceController@index');
Route::get('/absence/{id}/détail', 'AbsenceController@show');
Route::get('/absence/{id}/edit','AbsenceController@edit');
Route::put('/absence/{id}','AbsenceController@update');
Route::get('/absence/{id}','AbsenceController@destroy');

Route::get('/absences/etudiant', 'AbsenceController@getAbsencesEtudiant');
Route::get('/absences/etudiants', 'AbsenceController@getAbsencesEtudiantEp');

//notess
//Route::get('/note/new', 'NoteController@create');
//Route::post('/note/search', 'NoteController@form_search');
Route::post('/note', 'NoteController@store');
//Route::get('/note/classe', 'NoteController@classe');
Route::get('/notes', 'NoteController@index');
//Route::get('/note/add', 'NoteController@form_note')->name('note_add');
Route::get('/note/{id}/détail', 'NoteController@show')->name('note_détail');
Route::get('/note/{id}/{matiere_id}/list', 'NoteController@getListNotesEtudiants');
Route::get('/note/{id}/edit','NoteController@edit');
Route::put('/note/{id}','NoteController@update');
Route::delete('/note/{id}','NoteController@destroy'); 

Route::get('/notes/categorie', 'NoteController@getCategories');
Route::get('/notes/etudiant', 'NoteController@getNotesEtudiant');
Route::get('/notes/etudiants', 'NoteController@getNotesEtudiantEp');

//demande document

Route::get('/demandedocument/nouvelle', 'DemandedocumentController@create');
Route::post('/demandedocument', 'DemandedocumentController@store');
Route::get('/demandedocuments', 'DemandedocumentController@index');

//année scolaire
Route::get('/année/new', 'AnnéeController@create');
Route::post('/annee', 'AnnéeController@store');
Route::get('/années', 'AnnéeController@index');
Route::get('/année/{id}/edit','AnnéeController@edit');
Route::put('/annee/{id}','AnnéeController@update');
Route::delete('/année/{id}','AnnéeController@destroy');

//categorie
Route::get('/mesCategories', 'CategorieController@mesCatégories');
Route::get('/categorie/{id_categorie}/classes', 'CategorieController@mesClasses');
Route::get('/classes/{id_classe}/etudiants', 'CategorieController@mesEtudiants');
Route::get('/absences/{id_classe}/etudiants', 'CategorieController@absenceEtudiants');
Route::get('/notes/{id_classe}/etudiants', 'CategorieController@noteEtudiants');
Route::get('/payments/{id_classe}/etudiants', 'CategorieController@addPaymentEtudiants');

Route::post('/storeNote', 'NoteController@storeNote');
Route::post('/storeAbsence', 'AbsenceController@storeAbsence');
Route::get('/liste-des-notes-etudiants', 'NoteController@getListNotesEtudiants');


Route::get('/categorie/new', 'CategorieController@create');
Route::get('/categories', 'CategorieController@index');
Route::get('/categorie/{id}/edit','CategorieController@edit');
Route::put('/categorie/{id}','CategorieController@update');
Route::post('/categorie','CategorieController@store');
Route::delete('/categorie/{id}','CategorieController@destroy');

//niveau
Route::get('/niveau/new', 'NiveauController@create');
Route::post('/niveau', 'NiveauController@store');
Route::get('/niveaux', 'NiveauController@index');
Route::get('/niveau/{id}/edit','NiveauController@edit');
Route::put('/niveau/{id}','NiveauController@update');
Route::delete('/niveau/{id}','NiveauController@destroy');

//classe
Route::get('/classe/new', 'ClasseController@create');
Route::get('/classes', 'ClasseController@index');
Route::get('/classe/{id}/edit','ClasseController@edit');
Route::put('/classe/{id}','ClasseController@update');
Route::delete('/classe/{id}','ClasseController@destroy');
Route::post('/classe', 'ClasseController@store');

//matiere
Route::get('/matiere/new', 'MatiereController@create');
Route::get('/matieres', 'MatiereController@index');
Route::post('/matiere', 'MatiereController@store');
Route::get('/matiere/{id}/edit','MatiereController@edit');
Route::put('/matiere/{id}','MatiereController@update');
Route::delete('/matiere/{id}','MatiereController@destroy');


Route::get('/cour/new', 'CourController@create');
Route::get('/cours', 'CourController@index');
Route::get('/cour/{id}/edit','CourController@edit');
Route::put('/cour/{id}','CourController@update');
Route::get('/cour/{id}','CourController@destroy');