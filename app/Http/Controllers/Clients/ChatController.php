<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;




class ChatController extends Controller
{
    public function index($userId = null)
    {
        // Lấy chat của người dùng (hoặc người dùng cụ thể nếu có userId)
        $chats = Chat::where('user_id', $userId)->get();
    
        // Truyền dữ liệu đến view
        return view('clients.pages.chats.index', compact('chats', 'userId'));
    }
    public function send(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        // Lưu tin nhắn vào cơ sở dữ liệu
        Chat::create([
            'user_id' => $request->input('user_id'),
            'is_admin' => false, // false nếu là tin nhắn từ người dùng
            'message' => $request->input('message'),
        ]);

        // Tạo thông báo mới cho admin
        Notification::create([
            'type' => 'new_message',
            'data' => json_encode([
                'user_id' => $request->input('user_id'),
                'message' => 'Có tin nhắn từ người dùng #' . $request->input('user_id'),
            ]),
            'is_read' => false,
        ]);

        // Chuyển hướng về trang chat với thông báo thành công
        return redirect()->route('clients.chats.index', ['userId' => $request->input('user_id')])
                         ->with('success', 'Tin nhắn đã được gửi!');
    }
}
