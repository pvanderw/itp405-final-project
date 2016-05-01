<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Playlist;
use App\Models\PlaylistSongs;
use Validator;
use Auth;

class PlaylistController extends Controller
{
    public function index()
    {
    	return view("playlist");
    }

    public function create(Request $request)
    {
    	$validation = Validator::make($request->all(), [
    		'name' => 'required|regex:/^[a-z\d\-_\s]+$/i'
    	]);

    	if ($validation->fails())
    	{
    		return redirect('playlist')->withErrors($validation);
    	}

    	$playlist = new Playlist([
    		'name' => $request->input('name')
    	]);

    	$user = Auth::user();
    	$user->playlists()->save($playlist);

    	return redirect('/home');
    }

    public function show($id)
    {
    	$playlist = Playlist::with('playlistsongs')->where('id', '=', $id)->first();
    	return view('view_playlist', [
    		'playlist' => $playlist
    	]);
    }

    public function add(Request $request)
    {
        $playlist_id = $request->input('playlist');
        $track_id = $request->input('track_id');
        $name = $request->input('title');

        $playlist = Playlist::find($playlist_id);
        $playlist_song = new PlaylistSongs([
            'song_id' => $track_id,
            'name' => $name
        ]);

        $playlist->playlistsongs()->save($playlist_song);

        return redirect('/discover_next_song');
    }
}
