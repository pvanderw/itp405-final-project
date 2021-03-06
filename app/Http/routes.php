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
    Route::post('/add_to_playlist', 'PlaylistController@add');

    // Soundcloud routes
    Route::get('/discover', 'SoundcloudController@discover');
    Route::post('/filter' , 'SoundcloudController@getFilteredTracks');
    Route::post('/nextTrack', 'SoundcloudController@nextTrack');
    Route::get('/discover_next_song', 'SoundcloudController@update');
    Route::get('/track/{id}', 'SoundcloudController@showTrack');

    // LikedSongs routes
    Route::post('/likeTrack', 'LikedSongsController@add');
    Route::get('/liked_songs', 'LikedSongsController@show');

    // Admin routes
    Route::get('/admin', 'AdminController@show');
    Route::post('/deleteUser', 'AdminController@deleteUser');
    Route::get('/user/{id}', 'AdminController@user');

    

});