<?php

namespace App\Services\API;

use Illuminate\Http\Request;

use Cache;

class SoundCloud {

	protected $clientID;

	public function __construct()
	{
		$this->clientID = "20c47993de6f3540cfce0197c2ac7efb";
	}

	public function getFilteredTracks(Request $request)
	{
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

		if ($genre)
		{
			$url = $url . "genres=$genre&";
		}

		if ($minDate)
		{
			$url = $url . "created_at[from]=$minDate&";
		}

		if ($maxDate)
		{
			$url = $url . "created_at[to]=$maxDate&";
		}

		if ($artist)
		{

		}

		if ($minBPM)
		{
			$url = $url . "bpm[from]=$minBPM&";
		}

		if ($maxBPM)
		{
			$url = $url . "bpm[to]=$maxBPM&";
		}

		$jsonString = file_get_contents($url);
		$tracks = json_decode($jsonString);

		return $tracks;
	}

}