<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $users = User::all();
        return view('users.index', compact('users'));
=======
        if (Auth::user() && Auth::user()->can('can_edit_users'))
        {
            $users = User::all();
            return view('users.index', compact('users'));
        } else {
            abort(403);
        }
>>>>>>> a089125964df5b4f36f14aa9d5310d7ba9aade98
    }
}
