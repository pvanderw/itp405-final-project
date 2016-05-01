@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $playlist->name }}</div>
                    <ul>
                    <?php foreach ($playlist->playlistsongs as $song) : ?>
                        <li><a href="/track/{{$song->song_id}}">{{ $song->name }}</a></li>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection