<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Session;
use Auth;

class SoundcloudController extends Controller
{
	private $clientID = "20c47993de6f3540cfce0197c2ac7efb";

    public function discover()
    {
    	$user = Auth::user();
    	$playlists = $user->playlists;

    	Session::put('tracks', NULL);
    	Session::put('counter', 0);
    	Session::put('trackCount', 0);

    	return view('discover', [
    		'tracks' => Session::get('tracks'),
    		'counter' => Session::get('counter'),
    		'trackCount' => Session::get('trackCount'),
    		'playlists' => $playlists
    	]);
    }

    public function update()
    {
    	$user = Auth::user();
    	$playlists = $user->playlists;

    	return view('discover', [
    		'tracks' => Session::get('tracks'),
    		'counter' => Session::get('counter'),
    		'trackCount' => Session::get('trackCount'),
    		'playlists' => $playlists
    	]);
    }

    public function getFilteredTracks(Request $request)
	{
		// $regex = "/^\d{4}-\d{2}-\d{2}$/";
		// $regex = "/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$//";
		$regex = "/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/";
		$validation = Validator::make($request->all(), [
			'artist' => 'regex:/^[a-z\d\-_\s]+$/i',
			'min_date' => "regex:$regex",
			'max_date' => "regex:$regex",
			'min_bpm' => 'numeric|min:0|max:200',
			'max_bpm' => 'numeric|min:0|max:200'
		]);

		if ($validation->fails())
		{
			return redirect('/discover')->withErrors($validation);
		}

		$genre = $request->input('genre');
		// $minPlays = $request->input('min_plays');
		// $maxPlays = $request->input('max_plays');
		$minDate = $request->input('min_date');
		$maxDate = $request->input('max_date');
		$artist = $request->input('artist');
		$minBPM = $request->input('min_bpm');
		$maxBPM = $request->input('max_bpm');


		$clientID = $this->clientID;
		$url = "http://api.soundcloud.com/tracks/?";

		if ($artist)
		{
			$a = str_replace(' ', '%20', $artist);
			$url = $url . "q=$a" . "&";
		}
		if ($genre)
		{
			$url = $url . "genres=$genre" . "&";
		}
		// if ($minPlays)
		// {
		// 	$url = $url . "q=play_count>$minPlays&";
		// }
		// if ($maxPlays)
		// {
		// 	$url = $url . "q=play_count<$maxPlays&";
		// }


		if ($minDate)
		{
			$date = str_replace(' ', '%20', $minDate);
			$url = $url . "created_at[from]=$date&";
		}

		if ($maxDate)
		{
			$date = str_replace(' ', '%20', $maxDate);
			$url = $url . "created_at[to]=$date&";
		}

		if ($minBPM)
		{
			$url = $url . "bpm[from]=$minBPM&";
		}

		if ($maxBPM)
		{
			$url = $url . "bpm[to]=$maxBPM&";
		}

		$url = $url . "limit=15&client_id=$clientID";
		$jsonString = file_get_contents($url);
		$tracks = json_decode($jsonString);
		Session::put('tracks', $tracks);
		Session::put('trackCount', count($tracks));
		Session::put('counter', 0);

		$user = Auth::user();
    	$playlists = $user->playlists;

		return view('discover', [
			'tracks' => $tracks,
			'counter' => Session::get('counter'),
			'trackCount' => Session::get('trackCount'),
			'playlists' => $playlists
		]);
	}

	public function nextTrack()
	{
		$count = Session::get('counter');
		if ($count < Session::get('trackCount'))
		{
			$count = $count + 1;
			Session::put('counter', $count);
		}

		return redirect("/discover_next_song");

	}

	public function showTrack($id)
	{
		$url = "http://api.soundcloud.com/tracks/?ids=$id&client_id=$this->clientID";
		$jsonString = file_get_contents($url);
		$track = json_decode($jsonString);

		return view('song', [
			'track' => $track[0]
		]);
	}
}
