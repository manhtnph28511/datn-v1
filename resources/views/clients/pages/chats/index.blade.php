@extends('clients.layouts.app')
@section('app')
<div class="container">
  <div class="dash-content">
    <h4 class="chat-header">Chat with Admin</h4>

    <!-- Hiển thị các tin nhắn đã gửi -->
    <div class="chat-box">
        @foreach ($chats as $chat)
            <div class="chat-message {{ $chat->is_admin ? 'admin-message' : 'user-message' }}">
                @if ($chat->is_admin)
                    <strong>Admin:</strong>
                @else
                    <strong>Bạn</strong>
                @endif
                <p>{{ $chat->message }}</p>
                @if ($chat->file_up)
                    <img src="{{ asset('storage/' . $chat->file_up) }}" alt="File" style="max-width: 100px; max-height: 100px;">
                @endif
                <span class="timestamp">{{ $chat->created_at->format('d-m-Y H:i') }}</span>

                <!-- Form xóa -->
                @if (!$chat->is_admin) <!-- Chỉ cho phép người dùng xóa tin nhắn của mình -->
                    <form action="{{ route('clients.chats.deleteMessageAndFile', ['id' => $chat->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Form gửi tin nhắn -->
    <form action="{{ route('clients.chats.send') }}" method="POST" enctype="multipart/form-data" class="chat-form">
        @csrf
        <input type="hidden" name="user_id" value="{{ $userId }}">
        <textarea name="message" rows="3" required class="chat-textarea" placeholder="Type your message..."></textarea>
        <input type="file" name="file_up" accept=".jpg,.png,.pdf,.docx" class="chat-file-input" />
        <button type="submit" class="chat-submit-btn">Send</button>
    </form>
</div>
</div>
@endsection

<style>
   /* General Styles */
/* General Styles */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* Adjust this if you want the content to be centered vertically */
}

.dash-content {
    padding: 15px;
    background-color: #f9f9f9;
    border-radius: 8px;
    width: 1000px;
}
.dash-content {
    padding: 15px;
    background-color: #f9f9f9;
    border-radius: 8px;
    width: 1000px;
}

.chat-header {
    text-align: center;
    font-size: 1.25em;
    margin-bottom: 15px;
    color: #333;
}

.chat-box {
    background-color: #fff;
    border-radius: 8px;
    padding: 10px;
    border: 1px solid #ddd;
    max-height: 400px;
    overflow-y: auto;
}

.chat-message {
    margin-bottom: 10px;
    padding: 8px;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.admin-message {
    background-color: #e0f7fa;
    color: #00796b;
}

.user-message {
    background-color: #fbe9e7;
    color: #d84315;
}

.chat-message strong {
    display: block;
    margin-bottom: 4px;
}

.chat-message p {
    margin: 0;
    margin-bottom: 8px;
}

.chat-message img {
    display: block;
    margin-top: 8px;
    border-radius: 4px;
    max-width: 150px;
    max-height: 150px;
}

.timestamp {
    display: block;
    font-size: 0.75em;
    color: #999;
    margin-top: 8px;
}

.chat-form {
    margin-top: 15px;
    background-color: #fff;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.chat-textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    resize: vertical;
    font-size: 0.9em;
}

.chat-file-input {
    margin-top: 8px;
    display: block;
}

.chat-submit-btn {
    display: block;
    width: 100%;
    padding: 8px;
    border: none;
    background-color: #00796b;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 8px;
    font-size: 0.9em;
}

.chat-submit-btn:hover {
    background-color: #004d40;
}

.btn-danger {
    border: none;
    background-color: #e53935;
    color: #fff;
    padding: 4px 8px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.85em;
}

.btn-danger:hover {
    background-color: #b71c1c;
}




</style>
