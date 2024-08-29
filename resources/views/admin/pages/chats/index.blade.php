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
                        <td>{{ \Carbon\Carbon::parse($chat->latest_message_time)->format('d-m-Y H:i') }}</td>
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
   .dash-content {
    padding: 20px;
    font-family: Arial, sans-serif;
}

h4 {
    font-size: 22px;
    margin-bottom: 20px;
    color: #333;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f4f4f4;
    font-weight: bold;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tr:hover {
    background-color: #f1f1f1;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
}

.btn-primary:hover {
    background-color: #0056b3;
    color: white;
}

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
    background-color: #f8f9fa;
    border-radius: 5px;
}

.chat-message {
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    font-size: 14px;
    line-height: 1.5;
}

.admin-message {
    background-color: #e9ecef;
    text-align: left;
    border-radius: 5px 5px 5px 0;
}

.user-message {
    background-color: #d4edda;
    text-align: right;
    border-radius: 5px 5px 0 5px;
}

.timestamp {
    font-size: 12px;
    color: #888;
    display: block;
    margin-top: 5px;
    text-align: right;
}

</style>
