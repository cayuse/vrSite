<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Course;
use Auth;

class CourseController extends Controller
{
    public function index()
    {

        if (Auth::user() && Auth::user()->hasRole('admin')) {
            $courses = Course::orderBy('created_at', 'desc')->paginate(10);

        } elseif (Auth::user() && Auth::user()->hasRole('teacher')) {
            $courses = Course::orderBy('created_at', 'desc')->where('user_id', Auth::id())->paginate(10);
        } else {
            abort(403);
        }
        return view('courses.index', compact('courses'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        if (Auth::user() && Auth::user()->can('add_courses')) {
            $course = new Course;
            $course->token = bin2hex(random_bytes(20));
            return view('courses.create');
        } else {
            abort(403);
        }
    }

    public function edit($id)
    {

        if (Auth::user() && Auth::user()->can('add_courses')) {
            $course = Course::findOrFail($id);
            return view('courses.edit')->with(compact('course'));
        } else {
            abort(403);
        }
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->all());
        return redirect('course');
    }

    public function update($id, CourseRequest $request)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect('course');
    }
}
