@extends('layouts.app')

@section('pageTitle', 'Users')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Course</div>

            <div class="panel-body">
                {!! Form::model($course, ['method' => 'PATCH', 'action' => ['CourseController@update', $course->id]]) !!}
                @include('courses._form', ['submitButtonText' => 'Update Course'])
                {!! Form::close() !!}
                @include('errors.list')
            </div>
        </div>
    </div>

@endsection
