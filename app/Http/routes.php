<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

	// Authentication routes
    Route::get('/', function () {
        return view('welcome');
    });
    Route::auth();
    Route::get('/home', 'HomeController@index');

    // Playlist routes
    Route::get('/playlist', 'PlaylistController@index');
    Route::post('/playlist', 'PlaylistController@create');
    Route::get('/playlists/{id}', 'PlaylistController@show');

    // Soundcloud routes
    Route::get('/discover', 'SoundcloudController@discover');
    Route::post('/filter' , 'SoundcloudController@getFilteredTracks');


    

});