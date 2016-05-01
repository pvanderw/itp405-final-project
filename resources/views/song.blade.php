@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6" style="margin: 0px auto; float:none;">
            <h2 id="title">{{$track->title}}</h2>
            <h4 id="genre">{{$track->genre}}</h4>
            <iframe
                id="song"
                width="500"
                height="300"
                scrolling="no"
                frameborder="no"
                src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{$track->id}}&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true">
            </iframe>
        </div>
    </div>
</div>
@endsection
