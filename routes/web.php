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

//HOMEPAGE
Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', 'ChessController@index');

Route::post('/updateChess', 'ChessController@updateChess');
Route::post('/vote', 'ChessController@vote');

Route::get('/chess', function () {
    return view('chess');
});

Route::get('/masterpage', function () {
    return view('masterPage');
});

//RANKING
Route::get('/ranking/{attr}', 'RankingController@form');
Route::delete('/ranking/raw', 'RankingController@delete');
Route::get('/ranking', function () {
    return view('ranking');
});



Route::get('/register', function () {
    return view('register');
});

//CHAT
Route::get('/chat', 'ChatController@index');

Route::post('/sendMessage', 'ChatController@sendMessage');

//PROFILE


Route::get('/perfil', function () {
    return view('perfil');
});
Route::get('/perfil/{id}', 'UserController@delete');
Route::put('/perfil', 'UserController@update');

//PANEL ADMINISTRATOR
Route::get('/panelAdmin', function () {
    return view('panelAdmin');
});
Route::get('/panelAdmin/users', 'UserController@index');
Route::get('/panelAdmin/users/{attribute}/{value}', 'UserController@show');
Route::get('/panelAdmin/users/all',  function () {
    return redirect('/panelAdmin/users/all/0');
});
Route::get('/panelAdmin/comments', 'CommentController@index');
Route::post('/panelAdmin/comments/{id}', 'CommentController@delete');
Route::get('/panelAdmin/comments/{attribute}/{value}', 'CommentController@show');
Route::get('/panelAdmin/comments/all',  function () {
    return redirect('/panelAdmin/comments/all/0');
});
Route::post('/panelAdmin/comments/update/{id}', 'CommentController@update');
Route::post('/register', 'UserController@store');


//HISTORIAL
Route::get('/historial', 'GamesController@index');
Route::delete('/historial/{id}', 'GamesController@delete');

//EMAIL
Route::get('/contactUs', function (){
    return view('contactUs');
});

// Email related routes
Route::get('mail/send', 'MailController@send');
Auth::routes();
Route::get('/logout', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout ');

Route::get('/info', function () {
    return view('info');
});

Route::post('/contactus','MailController@create');