<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\ClientsNotification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function index($userId = null)
    {
        if ($userId) {
            return redirect()->route('admin.chats.show', ['userId' => $userId]);
        }

        // Lấy danh sách chat nếu không có userId
        $chats = Chat::with('user')
            ->where('is_admin', false)
            ->orWhere('is_admin', true)
            ->select('user_id', DB::raw('MAX(created_at) as latest_message_time'))
            ->groupBy('user_id')
            ->orderBy('latest_message_time', 'desc')
            ->get();

        return view('admin.pages.chats.index', compact('chats'));
    }

    // Hiển thị thông tin chat của một người dùng cụ thể
    public function show($userId)
{
    // Lấy tất cả tin nhắn giữa người dùng cụ thể và admin
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

    // Tìm người dùng
    $user = User::findOrFail($userId);

    return view('admin.pages.chats.show', compact('chats', 'user'));
}


    public function sendMessage(Request $request, $userId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'file_up' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
        ]);
    
        $filePath = null;
        if ($request->hasFile('file_up')) {
            $file = $request->file('file_up');
            $filePath = $file->store('chat_files', 'public');
        }
    
        // Lưu tin nhắn của admin
        Chat::create([
            'user_id' => $userId,
            'is_admin' => true,
            'message' => $request->input('message'),
            'file_up' => $filePath,
        ]);
    
        return redirect()->route('admin.chats.show', ['userId' => $userId])
            ->with('success', 'Tin nhắn đã được gửi!');
    }
    



public function deleteMessageAndFile($id)
{
    
    $chat = Chat::findOrFail($id);

    
    if ($chat->file_up) {
        Storage::disk('public')->delete($chat->file_up);
    }

   
    $chat->delete();

    return redirect()->route('admin.chats.show', ['userId' => $chat->user_id])
                     ->with('success', 'Tin nhắn và tệp đã được xóa!');
}
}

