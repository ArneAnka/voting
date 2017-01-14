<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){
		// Notes //
	Route::get('/notes', 'NoteController@index');
	Route::post('/notes', 'NoteController@store');
	Route::get('/notes/{id}', 'NoteController@edit');
	Route::post('/notes/{id}', 'NoteController@editSave');
	Route::delete('/notes/{id}', 'NoteController@delete');

		// Comments //
	Route::get('/m/{game}', 'CommentController@index')->name('game');
	Route::post('/m/{game}/comment', 'CommentController@topLevel')->name('top.level');
	Route::post('/m/{game}/comment/{comment}/store', 'CommentController@store')->name('comment.store');
	Route::get('/m/{game}/comment/{id}/edit', 'CommentController@edit');
	Route::post('/m/{game}/comment/{id}/edit', 'CommentController@editStore');
	Route::get('/m/{game}/comment/{id}/delete', 'CommentController@delete');

		// Votes //	
	Route::get('/m/{game}/votes', 'GameVoteController@show'); //14:27
	Route::post('m/{game}/comment/{id}/upvote', 'CommentController@upvote');
	Route::post('m/{game}/comment/{id}/downvote', 'CommentController@downvote');

		// View items //
	Route::get('/l/all', 'GameController@all')->name('all');
	Route::get('/l/nes', 'GameController@nes')->name('nes');
	Route::get('/l/snes', 'GameController@snes')->name('snes');

});
