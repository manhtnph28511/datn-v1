@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="dash-content">
            <h4>Quản lý Chat của Người dùng</h4>
    
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Người dùng</th>
                        <th>Tên Người dùng</th>
                        <th>Thời gian</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chats as $chat)
                    <tr>
                        <td>{{ $chat->user_id }}</td>
                        <td>{{ $chat->user->name }}</td>
                        <td>{{ $chat->created_at->format('d-m-Y H:i') }}</td> 
                        <td>
                            <a href="{{ route('admin.chats.show', ['userId' => $chat->user_id]) }}" class="btn btn-primary">Xem/Trả lời</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    
          
</div>
@endsection

<style>
    .chat-container {
        max-width: 800px;
        margin: auto;
    }
    .chat-box {
        max-height: 500px;
        overflow-y: auto;
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
    }
    .chat-message {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .admin-message {
        background-color: #f0f0f0;
        text-align: left;
    }
    .user-message {
        background-color: #d0f0d0;
        text-align: right;
    }
    .timestamp {
        font-size: 0.8em;
        color: #999;
    }
</style>
