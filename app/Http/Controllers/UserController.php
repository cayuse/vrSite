<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use App\Avatar;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {

        if (Auth::user() && Auth::user()->can('edit_users')) {
            $users = User::orderBy('name', 'asc')->paginate(10);
            return view('users.index', compact('users'));
        } else {
            abort(403);
        }
    }

    public function edit($id)
    {
        if (Auth::user() && Auth::user()->can('edit_users')) {
            $user = User::findOrFail($id);
        } elseif (Auth::user()) {
            $user = User::findOrFail(Auth::id());
        } else {
            abort(403);
        }
        $avatars = Avatar::orderBy('name', 'asc')->get();
        return view('users.edit')->with(compact('user', 'avatars'));
    }

    public function profile()
    {
        if (Auth::user()) {
            $user = User::findOrFail(Auth::user()->id);
            $avatars = Avatar::orderBy('name', 'asc')->get();
            return view('users.edit')->with(compact('user', 'avatars'));
        } else {
            abort(403);
        }
    }

    public function update($id, UserRequest $request)
    {
        if (Auth::user())
            $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect('home   ');
    }
}
