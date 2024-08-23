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
                    <span class="timestamp">{{ $chat->created_at->format('d-m-Y H:i') }}</span>
                </div>
            @endforeach
        </div>

        <!-- Form gửi tin nhắn -->
        <form action="{{ route('admin.chats.sendMessage', ['userId' => $user->id]) }}" method="POST">
            @csrf
            <textarea name="message" rows="3" placeholder="Nhập tin nhắn..." required></textarea>
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </div>
@endsection
