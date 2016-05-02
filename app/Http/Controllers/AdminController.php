<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function show()
    {
    	$user = Auth::user();
    	if ($user->email == "admin@usc.edu")
    	{
    		$users = User::all();

    		return view('admin', [
    			'users' => $users
    		]);

    	}
    	else
    	{
    		return redirect('/home');
    	}
    }

    public function deleteUser(Request $request)
    {
    	$email = $request->input("email");
    	$user = User::where('email', '=', $email)->first();

    	// Delete all songs in each of the user's playlists
    	foreach ($user->playlists as $playlist)
    	{
    		$playlist->playlistsongs()->delete();
    	}

    	$user->playlists()->delete();
    	$user->likedsongs()->delete();
    	$user->delete();

    	return redirect('/admin');
    }

    public function user($id)
    {
    	$user = User::find($id);
    	return view('user', [
    		'user' => $user
		]);
    }
}
