<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\LikedSongs;
use Auth;

class LikedSongsController extends Controller
{
    public function add(Request $request)
    {
    	$song_id = $request->input('track_id');
    	$name = $request->input('title');

    	$likedSong = new LikedSongs([
    		'song_id' => $song_id,
    		'name' => $name
    	]);

    	$user = Auth::user();
    	$user->likedsongs()->save($likedSong);

    	return redirect('/discover_next_song');
    }

    public function show()
    {
    	$user = Auth::user();
    	$songs = $user->likedsongs;

    	return view('/liked_songs', [
    		'songs' => $songs
    	]);
    }
}
