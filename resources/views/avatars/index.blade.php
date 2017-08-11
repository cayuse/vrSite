@extends('layouts.app')

@section('pageTitle', 'Avatars')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Listing Avatars</div>

            <div class="panel-body">
                <a href="{{ route('avatars.create')}}" class="btn btn-info">New Avatar</a>

                </br>
                @if (count($avatars))
                    <table class="table table-striped">
                        <thead class="thead-default">
                        <tr>
                            <th>Preview</th>
                            <th>Name</th>
                            <th>Argument</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($avatars as $key=>$avatar)
                            <tr>
                                <th scope="row"><img src="/images/avatars/{{ $avatar->path }}" class="avatar avatar-sm" ></th>
                                <td><a href="{{ action('AvatarController@edit', [$avatar->id]) }}">{{ $avatar->name }}</a></td>
                                <td>{{ $avatar->argument }}</td>
                            </tr>
                            <?php ++$key; ?>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                {{ $avatars->links() }}
            </div>
        </div>
    </div>

@endsection
