@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Discover Options</h1>
			<form class="form-inline" method="post" action="/filter">
				{{ csrf_field() }}
				<div class="row">
					<div class="form-group col-md-3">
						<label class="control-label" for="genre">Genre: </label>
						<select class="form-control" name="genre">
							<option value="AlternativeRock">Alternative Rock</option>
							<option>Ambient</option>
							<option>Classical</option>
							<option>Country</option>
							<option value="Dance&EDM">Dance & EDM</option>
							<option>Dancehall</option>
							<option value="DeepHouse">Deep House</option>
							<option>Disco</option>
							<option value="Drum&Bass">Drum & Bass</option>
							<option>Dubstep</option>
							<option>Electronic</option>
							<option>Folk & Singer-Songwriter</option>
							<option>Hip-hop & Rap</option>
							<option>House</option>
							<option>Indie</option>
							<option>Jazz & Blues</option>
							<option>Latin</option>
							<option>Metal</option>
							<option>Piano</option>
							<option>Pop</option>
							<option value="R&B">R&B & Soul</option>
							<option>Raggae</option>
							<option>Reggaeton</option>
							<option>Rock</option>
							<option>Soundtrack</option>
							<option>Techno</option>
							<option>Trance</option>
							<option>Trap</option>
							<option>Triphop</option>
							<option>World</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label class="control-label" for="artist">Artist</label>
						<input class="form-control" type="text" name="artist">
					</div>
					<div class="form-group col-md-3">
						<label class="control-label" for="min_plays">Min. Plays: </label>
						<input class="form-control" type="text" name="min_plays">
					</div>
					<div class="form-group col-md-3">
						<label class="control-label" for="max_plays">Max Plays: </label>
						<input class="form-control" type="text" name="max_plays">
					</div>
				</div>
				<div class="row" style="margin-top: 10px;">
					<div class="form-group col-md-3">
						<label class="control-label" for="min_bpm">Min. BPM</label>
						<input class="form-control" type="text" name="min_bpm">
					</div>
					<div class="form-group col-md-3">
						<label class="control-label" for="max_bpm">Max BPM</label>
						<input class="form-control" type="text" name="max_bpm">
					</div>
					<div class="form-group col-md-3">
						<label class="control-label" for="min_date">Min. Date: </label>
						<input class="form-control" type="date" name="min_date">
					</div>
					<div class="form-group col-md-3">
						<label class="control-label" for="max_date">Max Date</label>
						<input class="form-control" type="date" name="max_date">
					</div>
					<button class="btn btn-success" type="submit" style="margin-top: 10px;">Filter Songs</button>
				</div>
			</form>
        </div>
    </div>

<?php 
    if ($tracks)
    {
    	var_dump($tracks);
  //   	for ($i=0; $i<count($tracks);)
	 //    <div>
		// 	<h4>{{$track->title}}</h4>
		// 	<p>{{$track->genre}}</p>
		// 	<iframe
		// 		width="500"
		// 		height="300"
		// 		scrolling="no"
		// 		frameborder="no"
		// 		src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{$track->id}}&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true">
		// 	</iframe>
		// </div>
	// </div>
    }
?>
@endsection