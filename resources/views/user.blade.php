@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>User Name: {{ $user->name }}</h1>
            <h1>Email: {{ $user->email }}</h1>
            <h1>Playlists:</h1>
            <ul>
                <?php foreach ($user->playlists as $playlist) : ?>
                    <li>{{ $playlist->name }}</li>
                <?php endforeach ?>
            </ul>
            <h1>Liked Songs:</h1>
            <ul>
                <?php foreach ($user->likedsongs as $song) : ?>
                    <li>{{ $song->name }}</li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
@endsection