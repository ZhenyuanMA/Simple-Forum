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
    return Response::redirectTo('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/forum/{id}', 'ForumController@index');
Route::get('/thread/{id}', 'ThreadController@index');

Route::post('/thread/{id}/post', 'ThreadController@addPost');
Route::post('/forum/{id}/post', 'ForumController@addPost');

Route::get('/forum/{id}/follow', 'ForumController@follow');
