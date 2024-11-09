<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Message $message)
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('messages', compact('messages'));
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

    public function adminViewOffensive()
    {
        $offensiveMessages = Message::where(['status' => 'offensive'])->with('user')->get();
        return view('admin.offensive_messages', compact('offensiveMessages'));
    }

    public function removeOffensiveFlag(Message $message)
    {
        $message->update(['status' => 'new']);
        return redirect()->back()->with('success', 'Пометка оскорбительное снята');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'Сообщение удалено');
    }
}
