@extends('clients.layouts.app')
@section('app')
<div class="dash-content">
    <h4 style="text-align:center">Chat with Admin</h4>

    <!-- Hiển thị các tin nhắn đã gửi -->
    <div class="chat-messages">
        @foreach ($chats as $chat)
            <div class="chat-message {{ $chat->is_admin ? 'admin-message' : 'user-message' }}">
                <p>{{ $chat->message }}</p>
                <small>{{ $chat->created_at->format('d/m/Y H:i') }}</small>
            </div>
        @endforeach
    </div>

    <!-- Form gửi tin nhắn -->
    <form action="{{ route('clients.chats.send') }}" method="POST" class="chat-form">
        @csrf
        <input type="hidden" name="user_id" value="{{ $userId }}">
        <textarea name="message" rows="3" required class="chat-textarea" placeholder="Type your message..."></textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Send</button>
    </form>
</div>
@endsection

<style>
    .chat-messages {
    border: 1px solid #ddd;
    padding: 10px;
    height: 300px;
    overflow-y: scroll;
}

.chat-message {
    margin-bottom: 10px;
}

.admin-message {
    background-color: #f0f0f0;
    padding: 5px;
    border-radius: 5px;
}

.user-message {
    background-color: #d0f0c0;
    padding: 5px;
    border-radius: 5px;
    text-align: right;
}

.chat-form {
    margin-top: 20px;
}

.chat-textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-bottom: 10px;
}

</style>
