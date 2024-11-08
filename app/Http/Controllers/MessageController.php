<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {

        $messages = Message::orderBy('created_at')->get();
        return view('messages', compact('messages'));
    }

    public function show($id){
        $user = User::findoffail($id);
        $messages = $user->messages()->all()->get();
        return view('profile', compact('user', 'messages'));
    }

    public function store(Request $request, Message $message){
        $validated = $request->validate([
            'nickname' => 'required|string',
            'text' => 'required',
        ]);


        Message::create([
            'nickname' => $validated['nickname'],
            'text' => $validated['text'],
        ]);

        return redirect()->back()->with('success', 'Сообщение успешно сохранено');
    }

    public function offensive(Message $message){
        $message->update(['status' => 'offensive']);

        return redirect()->back();
    }
}
