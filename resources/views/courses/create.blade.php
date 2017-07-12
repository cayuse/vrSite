@extends('layouts.app')

@section('pageTitle', 'Users')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create New Course</div>

            <div class="panel-body">
                {!! Form::open(['route' => 'course.store']) !!}
                    @include('courses._form', ['submitButtonText' => 'Add Course'])
                {!! Form::close() !!}
                @include('errors.list')
            </div>
        </div>
    </div>

@endsection
