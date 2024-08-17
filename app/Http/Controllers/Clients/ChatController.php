<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;




class ChatController extends Controller
{
    public function index($userId = null)
    {
        // Nếu userId không được truyền, lấy ID của người dùng hiện tại
        if (!$userId) {
            $userId = Auth::id();
        }

        // Lấy chat của người dùng
        $chats = Chat::where('user_id', $userId)->get();

        return view('clients.pages.chats.index', compact('chats', 'userId'));
    }
}
