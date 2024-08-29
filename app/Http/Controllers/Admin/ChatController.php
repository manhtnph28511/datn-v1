<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\ClientsNotification;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index()
    {
       
        $chats = Chat::with('user')
        ->where('is_admin', false)
        ->orWhere('is_admin', true)
        ->select('user_id', DB::raw('MAX(created_at) as latest_message_time')) 
        ->groupBy('user_id') 
        ->orderBy('latest_message_time', 'desc') 
        ->get();

        return view('admin.pages.chats.index', compact('chats'));
    }

    public function show($userId)
    {
        $chats = Chat::where('user_id', $userId)
                     ->orWhere('is_admin', true)
                     ->orderBy('created_at', 'asc')
                     ->get();
                     
        $user = User::findOrFail($userId); 

        return view('admin.pages.chats.show', compact('chats', 'user'));
    }

    public function sendMessage(Request $request, $userId)
    {
        
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);


        
        Chat::create([
            'user_id' => $userId,
            'is_admin' => true,
            'message' => $request->input('message'),
        ]);

       
        ClientsNotification::create([
            'type' => 'new_message',
            'data' => json_encode([
                'user_id' => $userId,
                'message' => 'Có tin nhắn mới từ admin.',
            ]),
            'is_read' => false,
        ]);

        return redirect()->route('admin.chats.show', ['userId' => $userId])
                         ->with('success', 'Tin nhắn đã được gửi!');
    }
}

