@extends('layouts.app')

@section('pageTitle', 'Home')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $course->name }}</div>
            @if ($course->motd)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <h3>{!!  $course->motd !!}</h3>
                        </div>
                    </div>
                </div>
            @endif
            @if ($course->user_id == Auth::id())
                <a href=# class="btn btn-info">Start Session</a>
            @else
                <a href=# class="btn btn-info">Join Session</a>
            @endif

            </div>
        </div>
    </div>

@endsection