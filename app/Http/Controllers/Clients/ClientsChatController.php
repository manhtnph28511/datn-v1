<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientsChatController extends Controller
{
    public function index($userId = null)
{
    if ($userId) {
        $chats = Chat::where(function ($query) use ($userId) {
                        $query->where('user_id', $userId)
                              ->where('is_admin', false);
                    })
                    ->orWhere(function ($query) use ($userId) {
                        $query->where('user_id', $userId)
                              ->where('is_admin', true);
                    })
                    ->orderBy('created_at', 'asc')
                    ->get();

        $user = User::findOrFail($userId);
    } else {
        $chats = collect(); // Nếu không có userId, không lấy tin nhắn nào
        $user = null;
    }

    return view('clients.pages.chats.index', compact('chats', 'user', 'userId'));
}

    

    public function send(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
            'file_up' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file_up')) {
            $file = $request->file('file_up');
            $filePath = $file->store('chat_files', 'public'); 
        }

        Chat::create([
            'user_id' => $request->input('user_id'),
            'is_admin' => false,
            'message' => $request->input('message'),
            'file_up' => $filePath,
        ]);

        return redirect()->route('clients.chats.index', ['userId' => $request->input('user_id')])
                         ->with('success', 'Tin nhắn đã được gửi!');
    }

    public function deleteMessageAndFile($id)
{
    
    $chat = Chat::findOrFail($id);

    
    if ($chat->file_up) {
        Storage::disk('public')->delete($chat->file_up);
    }

   
    $chat->delete();

    return redirect()->route('clients.chats.index', ['userId' => $chat->user_id])
                     ->with('success', 'Tin nhắn và tệp đã được xóa!');
}


}
