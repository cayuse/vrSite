@extends('layouts.app')

@section('pageTitle', 'Users')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Avatar</div>

            <div class="panel-body">
                {!! Form::model($avatar, ['method' => 'PATCH', 'action' => ['AvatarController@update', $avatar->id]]) !!}
                @include('avatars._form', ['submitButtonText' => 'Update Avatar'])
                {!! Form::close() !!}
                @include('errors.list')
            </div>
        </div>
    </div>

@endsection
