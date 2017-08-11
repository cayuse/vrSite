@section('scripts')
    <script src="{{ asset('https://code.jquery.com/jquery-1.12.4.min.js') }}"></script>
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
    {!! Form::label('avatar_id', 'Select Avatar:') !!}
    {{ Form::hidden('avatar_id', $user->avatar_id) }}
    @foreach ($avatars as $avatar)
        <img src="/images/avatars/{{ $avatar->path }}" class="avatar avatar-lg" id="{{ $avatar->id }}">
    @endforeach
</div>

<div class="form-group clearfix">
    <div class="pull-left">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        <br>
    </div>
</div>

<script type="text/javascript">
    $().ready( function() {
        var curr = $("#avatar_id").val();
        $("img#" + curr).addClass("selected");
    });

    $(function () {
        $("img").click(function () {
            $("img").removeClass("selected");
            $(this).addClass("selected");
            $("#avatar_id").val(this.id);
        });
    });
</script>