@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif  
			<form class="form-inline" method="post" action="/filter">
				{{ csrf_field() }}
				<div class="row">
					<div class="form-group col-md-3">
						<label class="control-label" for="genre">Genre: </label>
						<select class="form-control" name="genre">
							<option></option>
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
						<label class="control-label" for="min_date">Min. Date: </label>
						<input class="form-control" type="date" name="min_date" placeholder="yyyy-mm-dd hh:mm:ss">
					</div>
					<!-- <div class="form-group col-md-3">
						<label class="control-label" for="min_plays">Min. Plays: </label>
						<input class="form-control" type="text" name="min_plays">
					</div>
					<div class="form-group col-md-3">
						<label class="control-label" for="max_plays">Max Plays: </label>
						<input class="form-control" type="text" name="max_plays">
					</div> -->
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
						<label class="control-label" for="max_date">Max Date</label>
						<input class="form-control" type="date" name="max_date" placeholder="yyyy-mm-dd hh:mm:ss">
					</div>
					<button class="btn btn-success" type="submit">Filter Songs</button>
				</div>
			</form>
        </div>
    </div>

    @if ($tracks)
	    <div class="col-md-6" style="margin: 0px auto; float:none;">
			<h2 id="title">{{$tracks[$counter]->title}}</h2>
			<h4 id="genre">{{$tracks[$counter]->genre}}</h4>
			<iframe
				id="song"
				width="500"
				height="300"
				scrolling="no"
				frameborder="no"
				src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{$tracks[$counter]->id}}&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true">
			</iframe>
		</div>
		<?php if ($counter < $trackCount-1) : ?>
			<div class="row" style="margin-bottom: 100px;">
				<div class="col-md-6">
					<form class="form-inline" method="post" action="/add_to_playlist" style="margin-left: 150px;">
						{{ csrf_field() }}
						<input type="hidden" name="track_id" value="<?php echo $tracks[$counter]->id ?>">
						<input type="hidden" name="title" value="<?php echo $tracks[$counter]->title ?>">
						<select class="form-control" name="playlist">
							<?php foreach ($playlists as $playlist) : ?>
								<option value="<?php echo $playlist->id ?>"><?php echo $playlist->name; ?></option>
							<?php endforeach ?>
						</select>
						<button class="btn btn-success">Add to Playlist</button>
					</form>
				</div>
				<div class="col-md-6">
					<form method="post" action="/nextTrack" style="margin-left:200px;">
						{{ csrf_field() }}
						<button id="nextButton" class="btn btn-success">
							Next Track<span class="glyphicon glyphicon-chevron-right"></span>
						</button>
					</form>
				</div>
			</div>
		<?php endif ?>
	@else
		<div class="col-md-6" style="margin: 50px auto; float:none;">
			<h1>No tracks with those parameters were found. Please try again</h1>
		</div>
	@endif
@endsection