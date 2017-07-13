<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('motd', 'MOTD') !!}
    {!! Form::text('motd', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('token', 'Token:') !!}
    {!! Form::text('token',(isset($course)) ? $course->token :  bin2hex(random_bytes(20)), ['class' => 'form-control', 'readonly' => 'readonly'] ) !!}
</div>

{{ Form::hidden('user_id', Auth::id()) }}

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
