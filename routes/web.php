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

//CHAT
Route::get('/chat', 'ChatController@index');

Route::post('/sendMessage', 'ChatController@sendMessage');
Route::get('/perfil', function () {
    return view('perfil');
});

//PANEL ADMINISTRATOR
Route::get('/panelAdmin', 'UserController@index');
Route::get('/panelAdmin/{attribute}/{value}', 'UserController@show');
Route::get('/panelAdmin/all',  function () {
    return redirect('/panelAdmin/all/0');
});