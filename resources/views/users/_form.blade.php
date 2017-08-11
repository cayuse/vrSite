@section('scripts')
    <script src="{{ asset('js/jquery-1.11.1.js') }}"></script>
    <script src="{{ asset('js/imagepicker.js') }}"></script>
@endsection
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    <div class="picker">
    {!! Form::label('avatar_id', 'Avatar:') !!}
    <select class="image-picker">
        @foreach ($avatars as $avatar)
            <option data-img-src="/images/avatars/{{ $avatar->path }}" data-img-alt='{{ $avatar->name }}'
                    value="{{ $avatar->id }}"> {{ $avatar->name }}</option>
        @endforeach
    </select>
    </div>
</div>

<div class="pull-left">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

<script type="text/javascript">
        $("select").imagepicker();
</script>