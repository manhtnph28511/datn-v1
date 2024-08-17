@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <h4>admin</h4>
    <div class="chat-messages">
        @foreach($chats as $chat)
            <div class="message sent">
                <p><strong>Admin:</strong> {{ $chat->message }}</p>
            </div>
        @endforeach
    </div>

    {{-- <form action="{{ route('chat.sendMessage', $userId) }}" method="POST">
        @csrf
        <input type="text" name="message" placeholder="Type your message...">
        <button type="submit">Send</button>
    </form> --}}
</div>
@endsection
