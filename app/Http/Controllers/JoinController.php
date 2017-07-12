<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class JoinController extends Controller
{
    public function index(Request $request, $id)
    {
        $course = Course::where('token', $id)->first();
        return view('join.join')->with(compact('course'));
    }
}
