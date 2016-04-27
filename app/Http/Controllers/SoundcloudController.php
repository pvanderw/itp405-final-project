<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class SoundcloudController extends Controller
{
	private $clientID = "20c47993de6f3540cfce0197c2ac7efb";

    public function discover()
    {
    	return view('discover', [
    		'tracks' => NULL
    	]);
    }

    public function getFilteredTracks(Request $request)
	{
		$validation = Validator::make($request->all(), [
			'artist' => 'regex:/^[a-z\d\-_\s]+$/i',
			'min_plays' => 'numeric|min:0|max:100000000',
			'max_plays' => 'numeric|min:1|max:100000000',
			'min_date' => 'regex:^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$',
			'max_date' => 'regex:^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$',
			'min_bpm' => 'numeric|min:0|max:200',
			'max_bpm' => 'numeric|min:0|max:200'
		]);

		if ($validation->fails())
		{
			return redirect('/discover')->withErrors($validation);
		}

		$genre = $request->input('genre');
		$minPlays = $request->input('min_plays');
		$maxPlays = $request->input('max_plays');
		$minDate = $request->input('min_date');
		$maxDate = $request->input('max_date');
		$artist = $request->input('artist');
		$minBPM = $request->input('min_bpm');
		$maxBPM = $request->input('max_bpm');


		$clientID = "?client_id=" . $this->clientID;
		$url = "http://api.soundcloud.com/tracks/?";

		if ($artist)
		{
			$url = $url . "q=$artist";
		}

		if ($genre)
		{
			$url = $url . "genres=$genre" . "&";
		}

		if ($minDate)
		{
			$url = $url . "created_at[from]=$minDate&";
		}

		if ($maxDate)
		{
			$url = $url . "created_at[to]=$maxDate&";
		}

		if ($minBPM)
		{
			$url = $url . "bpm[from]=$minBPM&";
		}

		if ($maxBPM)
		{
			$url = $url . "bpm[to]=$maxBPM&";
		}

		$url = $url . "client_id=$this->clientID";
		// $url = "http://api.soundcloud.com/tracks/?genres=Alternative%20Rock&client_id=20c47993de6f3540cfce0197c2ac7efb";
		$jsonString = file_get_contents($url);
		$tracks = json_decode($jsonString);

		return view('discover', [
			'tracks' => $tracks
		]);
	}
}
