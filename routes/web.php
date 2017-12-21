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


/*
Route::get('/hello', function () {
    return '<h1>hello<h1>';
});

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name.' with an id of '.$id;
});


*/


Route::get('/', 'PagesController@index');
//Route::get('/about', 'PagesController@about');
//Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');
Route::resource('trainingrequests', 'TrainingRequestsController');
Route::resource('traininglist' , 'TrainingListController');
Route::resource('blog', 'BlogController');
Route::resource('books', 'BooksController');
Route::resource('keyCode', 'keyCodeController');
Route::resource('survey', 'surveyListController');
Route::resource('dashboardmanager', 'ManageTrainingsController');
Route::resource('keyCodeForMan', 'keyCodeForManController');

//Route::resource('register', 'Auth\RegisterController');


Auth::routes();


Route::get('/dashboard', 'DashboardController@index');
Route::get('/books', 'BooksController@index');
Route::get('/traininglist', 'TrainingListController@index');
Route::get('/keyCode', 'keyCodeController@index');
Route::get('/survey', 'surveyListController@index');
Route::get('/keyCodeForMan', 'keyCodeForManController@index');
//Route::get('/register', 'Auth\RegisterController@index');
//Route::get('/blog', 'BlogController@index');

//Route::get('/trainings/{trainingId}');
