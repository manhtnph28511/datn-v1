<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\ClientsNotification;
use App\Models\User;

class ChatController extends Controller
{
    public function index()
    {
        // Eager load thông tin người dùng cùng với các tin nhắn
        $chats = Chat::with('user') // Kết hợp với bảng users
                     ->where('is_admin', false) // Tin nhắn từ người dùng
                     ->orWhere('is_admin', true) // Tin nhắn từ admin
                     ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian
                     ->get();

        return view('admin.pages.chats.index', compact('chats'));
    }

    public function show($userId)
    {
        $chats = Chat::where('user_id', $userId)
                     ->orWhere('is_admin', true)
                     ->orderBy('created_at', 'asc')
                     ->get();
                     
        $user = User::findOrFail($userId); // Lấy thông tin người dùng

        return view('admin.pages.chats.show', compact('chats', 'user'));
    }

    public function sendMessage(Request $request, $userId)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Lưu tin nhắn vào cơ sở dữ liệu
        Chat::create([
            'user_id' => $userId,
            'is_admin' => true, // true nếu là tin nhắn từ admin
            'message' => $request->input('message'),
        ]);

        // Tạo thông báo cho người dùng
        ClientsNotification::create([
            'type' => 'new_message',
            'data' => json_encode([
                'user_id' => $userId,
                'message' => 'Có tin nhắn mới từ admin.',
            ]),
            'is_read' => false,
        ]);

        // Chuyển hướng về trang chat của người dùng với thông báo thành công
        return redirect()->route('admin.chats.show', ['userId' => $userId])
                         ->with('success', 'Tin nhắn đã được gửi!');
    }
}

