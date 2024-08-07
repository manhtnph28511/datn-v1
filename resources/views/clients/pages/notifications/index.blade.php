@extends('clients.layouts.app')

@section('app')
    <div class="notifications">
        @if ($notifications->count() > 0)
            <h3>Danh sách thông báo</h3>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Tin nhắn</th>
                        <th scope="col" class="px-6 py-3">Thời gian</th>
                        <th scope="col" class="px-6 py-3">Trạng thái</th>
                        <th scope="col" class="px-6 py-3">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                        @php
                            $data = json_decode($notification->data);
                            $message = $data ? $data->message ?? 'No message' : 'No message' ;
                        @endphp
                         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $message }}</td>
                            <td class="px-6 py-4">{{ $notification->created_at }}</td>
                            @if ($notification->type === 'shipping_update')
                                <td class="px-6 py-4">
                                    <form action="{{ route('clients.notifications.confirmReceived', $notification->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Đã nhận</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">
                                {{ $message }}
                                @if (!$notification->is_read)
                                    <span class="text-red-500">(Chưa đọc)</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $notification->created_at }}</td>
                            <td class="px-6 py-4">
                                @if (!$notification->is_read)
                                    <span class="text-red-500">Chưa đọc</span>
                                @else
                                    <span class="text-green-500">Đã đọc</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <!-- Đánh dấu là đã đọc -->
                                @if (!$notification->is_read)
                                    <form action="{{ route('clients.notifications.markAsRead', $notification->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-blue-500 hover:text-blue-700">Đánh dấu là đã đọc</button>
                                    </form>
                                @else
                                    <span>Đã đọc</span>
                                @endif

                                <!-- Xóa thông báo -->
                                <form action="{{ route('clients.notifications.delete', $notification->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-4">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <a href="{{route('clients.index')}}">quay lại</a>
                </tbody>
            </table>
        @else
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    <i class="fa-solid fa-exclamation"></i>
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>Không có thông báo nào.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
