@extends('layouts.app')

@section('pageTitle', 'Home')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                {{ bin2hex(random_bytes(20)) }}
                You are logged in!
                <br>
                This page is just random stuff, it will either be filled in or removed later.
            </div>
        </div>
    </div>

@endsection