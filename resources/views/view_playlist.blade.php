@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $playlist->name }}</div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection