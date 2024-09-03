@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <h4>Chat với Người dùng: {{ $user->name }}</h4>
        
        <!-- Hiển thị thông báo thành công nếu có -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Hiển thị các tin nhắn -->
        <div class="chat-box">
            @foreach ($chats as $chat)
                <div class="chat-message {{ $chat->is_admin ? 'admin-message' : 'user-message' }}">
                    @if (!$chat->is_admin)
                        <strong>ID: {{ $chat->user_id }}</strong>
                        <strong>Người dùng: {{ $user->name }}</strong>
                    @else
                        <strong>Admin:</strong>
                    @endif
                    <p>{{ $chat->message }}</p>
                    @if ($chat->file_up)
                        <img src="{{ asset('storage/' . $chat->file_up) }}" alt="" style="max-width: 100px; max-height: 100px;">
                    @endif
                    <span class="timestamp">{{ $chat->created_at->format('d-m-Y H:i') }}</span>
                    <!-- Form xóa -->
                    @if ($chat->is_admin)
                    <form action="{{ route('admin.chats.deleteMessageAndFile', ['id' => $chat->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                @endif
                </div>
            @endforeach
        </div>
        

        <!-- Form gửi tin nhắn -->
        <form action="{{ route('admin.chats.sendMessage', ['userId' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="chat-form">
            @csrf
            <textarea name="message" rows="3" required class="chat-textarea" placeholder="Type your message..."></textarea>
            <input type="file" name="file_up" accept=".jpg,.png,.pdf,.docx" class="chat-file-input" />
            <button type="submit" class="chat-submit-btn">Send</button>
        </form>
        
        <a href="{{ route('admin.chats.index') }} " class="back-link">Quay lại</a>
    </div>
@endsection

<style>
    .dash-content {
    max-width: 800px;
    margin: auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h4 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.chat-box {
    max-height: 500px;
    overflow-y: auto;
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 20px;
    background-color: #fff;
    border-radius: 8px;
}

.chat-message {
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 10px;
    position: relative;
}

.admin-message {
    background-color: #e1f5fe;
    text-align: left;
}

.user-message {
    background-color: #ffecb3;
    text-align: left;
}

.timestamp {
    font-size: 0.8em;
    color: #999;
    position: absolute;
    bottom: 5px;
    right: 10px;
}

form textarea {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ddd;
    margin-bottom: 10px;
    resize: none;
}

form button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #0056b3;
}
.back-link {
    display: inline-block;
    padding: 8px 16px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.back-link:hover {
    background-color: #0056b3;
    color: #e0e0e0;
}

</style>
