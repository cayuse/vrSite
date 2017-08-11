@extends('layouts.app')

@section('pageTitle', 'Users')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create New Avatar</div>

            <div class="panel-body">
                {!! Form::open(['route' => 'avatars.store', 'files' => true]) !!}
                @include('avatars._form', ['submitButtonText' => 'Add Avatar'])
                {!! Form::close() !!}
                @include('errors.list')
            </div>
        </div>
    </div>

@endsection