<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $messages = $user->messages()->orderBy('created_at', 'desc')->get();
        return view('profile', compact('user', 'messages'));
    }
}
