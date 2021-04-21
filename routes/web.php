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

Route::get('/home', function () {
    return view('home');
});

Route::get('/chess', function () {
    return view('chess');
});

Route::get('/masterpage', function () {
    return view('masterPage');
});

//CHAT
Route::get('/chat', 'ChatController@index');

Route::post('/sendMessage', 'ChatController@sendMessage');
Route::post('sendMessage', 'ChatController@sendMessage');

//PROFILE

Route::get('/perfil', 'UserController@firstUser');
Route::delete('/perfil', 'UserController@delete');
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
Route::get('/panelAdmin/comments/{attribute}/{value}', 'CommentController@show');
Route::get('/panelAdmin/comments/all',  function () {
    return redirect('/panelAdmin/comments/all/0');
});
Route::get('/panelAdmin/comments/update/{id}/{content}', 'CommentController@update');

Route::post('/register', 'UserController@store');
