@extends('layouts.app')

@section('pageTitle', 'Users')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Users</div>

            <div class="panel-body">
                @if (count($users))
                    @foreach ($users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

@endsection
