<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JoinController extends Controller
{
    public function index(Request $request, $id)
    {
        //$name = $request->input('name');
        //$path = trim(parse_url($url, PHP_URL_PATH), '/');
        dd($id);
        $users = User::all();
        return view('users.index', compact('users'));
    }
}
