@extends('layouts.app')

@section('pageTitle', 'Users')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit User</div>

            <div class="panel-body">
                {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
                    @include('users._form', ['submitButtonText' => 'Update User'])
                {!! Form::close() !!}
                @include('errors.list')
            </div>
        </div>
    </div>

@endsection
