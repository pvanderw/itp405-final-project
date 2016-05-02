@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Banger</div>

                <div class="panel-body">
                    This site works as an type of addon to soundcloud that allows soundcloud users to discover new songs based off of their preferences. Users can search for music by genre, and then filter their results by a list of factors such as genre, artist, bpm, etc. There is also a discover option which works like tinder, except for music. The user picks a genre, and then is shown one song at a time. They can either like the song, therefor adding it to their like tracks, or skip it causing a new song to pop up. Users can also add songs to their playlists and view the songs they have liked so far.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
