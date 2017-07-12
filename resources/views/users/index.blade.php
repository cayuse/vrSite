@extends('layouts.app')

@section('pageTitle', 'Users')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Listing Users</div>

            <div class="panel-body">
                @if (count($users))
                    <h3>Index of Users</h3>
                    <table class="table table-striped">
                        <thead class="thead-default">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key=>$user)
                            <?php $curr = $users->perPage() * ($users->currentPage() -1 ) + $key +1 ?>
                            <tr>
                                <th scope="row">{{$curr}}</th>
                                <td><a href="{{ action('UserController@edit', [$user->id]) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <?php ++$key; ?>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                {{ $users->links() }}
            </div>
        </div>
    </div>

@endsection
