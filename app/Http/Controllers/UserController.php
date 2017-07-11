<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user() && Auth::user()->can('can_edit_users'))
        {
            $users = User::all();
            return view('users.index', compact('users'));
        } else {
            abort(403);
        }
    }
}
