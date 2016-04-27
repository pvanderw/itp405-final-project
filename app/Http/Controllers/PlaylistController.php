<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Playlist;
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
}
