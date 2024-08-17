<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); 
        $chats = Chat::where('user_id', $userId)->get();

        return view('admin.pages.chats.index', compact('chats'));
    }

    public function sendMessage(Request $request, $userId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Chat::create([
            'user_id' => $userId,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }
}

