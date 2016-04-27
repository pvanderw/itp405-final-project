@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Banger</div>

                <div class="panel-body">
                    This site works as an type of addon to soundcloud that allows soundcloud users to discover new songs based off of their preferences. Users can search for music by genre, and then filter their results by a list of factors such as number of plays, upload date, artist, etc. There is also a discover option which works like tinder, except for music. The user picks a genre, and then is shown one song at a time. They can either like the song, therefor adding it to their like tracks, or skip it causing a new song to pop up. Users can then go to their profile page and view the tracks they have liked so far and add them to their actual soundcloud profile or create playlists of their liked songs.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h1>Playlists</h1>
            <a href="/playlist">Create New Playlist</a>
            <ul>
                <?php foreach ($user->playlists as $playlist) : ?>
                    <li><a href="/playlists/{{ $playlist->id }}">{{ $playlist->name }}</a></li>
                <?php endforeach ?>
            </ul>
            
        </div>
    </div>
</div>
@endsection
