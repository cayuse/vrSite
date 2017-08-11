<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('argument', 'Argument;') !!}
    {!! Form::text('argument', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Avatar Image') !!}
    {!! Form::file('path'); !!}
</div>

<div class="pull-left">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
