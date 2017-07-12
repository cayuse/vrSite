@extends('layouts.app')

@section('pageTitle', 'Home')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Joining Course</div>
            <h1>{{ $course->name }}: Will Begin Shortly</h1>
            <br>
            ok, not really, but at least you can click into a page based on the original course.
            </div>
        </div>
    </div>

@endsection