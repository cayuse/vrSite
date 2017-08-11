<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('argument', 'Argument;') !!}
    {!! Form::text('argument', null, ['class' => 'form-control']) !!}
</div>
@if(isset($avatar) && $avatar->path)
    <div class="form-group clearfix">
        <h3>Current Image</h3>
        <img src="/images/avatars/{{ $avatar->path }}" class="avatar avatar-lg" id="{{ $avatar->id }}">
    </div>
@endif
<div class="form-group">
    {!! Form::label('Select Image') !!}
    {!! Form::file('path') !!}
</div>
<div class="form-group clearfix">
    <div class="pull-left">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        <br>
    </div>
</div>
