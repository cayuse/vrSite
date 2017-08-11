<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Avatar;
use Auth;

class AvatarController extends Controller
{
    public function index()
    {

        if (Auth::user() && Auth::user()->hasRole('admin')) {
            $avatars = Avatar::orderBy('created_at', 'desc')->paginate(10);
        } else {
            abort(403);
        }
        return view('avatars.index', compact('avatars'));
    }

    public function create()
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            $avatar = new Avatar;
            return view('avatars.create');
        } else {
            abort(403);
        }
    }

    public function edit($id)
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            $avatar = Avatar::findOrFail($id);
            return view('avatars.edit')->with(compact('avatar'));
        } else {
            abort(403);
        }
    }

    public function update($id, AvatarRequest $request)
    {
        $avatar = Avatar::findOrFail($id);
        $attributes = $request->all();
        if ($attributes['path']) {
            $path = time() . '.' . $request->path->getClientOriginalExtension();
            $request->path->move(base_path() . '/public/images/avatars', $path);
        } else {
            $path = $avatar->path;
        }
        $attributes['path'] = $path;
        $avatar->update($attributes);

        return redirect('avatars');
    }

    public function store(AvatarRequest $request)
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            $attributes = $request->all();
            $path = time() . '.' . $request->path->getClientOriginalExtension();
            $request->path->move(base_path() . '/public/images/avatars', $path);
            $attributes['path'] = $path;

            Avatar::create($attributes);
            return redirect('avatars');
        } else {
            abort(403);
        }
    }
}
