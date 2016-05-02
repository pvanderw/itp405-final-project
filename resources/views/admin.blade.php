@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>
                    <ul>
                    <?php foreach ($users as $user) : ?>
                        <li style="margin-top:10px;">
                            <form action="/deleteUser" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="email" value="{{ $user->email }}">
                                <a href="/user/{{ $user->id }}">{{ $user->email }}</a><button class="btn btn-danger" style="margin-left:10px;">Delete User</button>
                            </form>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection