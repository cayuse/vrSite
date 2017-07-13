@extends('layouts.app')

@section('pageTitle', 'Courses')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Courses Control</div>

            <div class="panel-body">
                <a href="{{ route('course.create')}}" class="btn btn-info">New Course</a>

                </br>
                @if (count($courses))
                    <h3>Index of Courses</h3>
                    <table class="table table-striped">
                        <thead class="thead-default">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Professor Name</th>
                            <th>Copy</th>
                            <th>Go</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($courses as $key=>$course)
                            <?php $curr = $courses->perPage() * ($courses->currentPage() -1 ) + $key +1 ?>
                        <tr>
                            <?php $myURL = url('/') . "/j/" . $course->token ?>
                            <th scope="row">{{$curr}}</th>
                            <td><a href="{{ action('CourseController@edit', [$course->id]) }}">{{ $course->name }}</a></td>
                            <td>{{ $course->user->name }}</td>
                            <td>{{ $myURL }}</td>
                            <td><a href="{{ $myURL }}">Course</a></td>
                        </tr>
                            <?php ++$key; ?>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                {{ $courses->links() }}
            </div>
        </div>
    </div>

@endsection
