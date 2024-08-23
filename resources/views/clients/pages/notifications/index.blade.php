@extends('clients.layouts.app')

@section('app')
<div class="notifications">
    @if ($notifications->count() > 0)
        <h3 class="text-xl font-semibold mb-4">Danh sách thông báo</h3>
        <table class="w-full text-sm text-left text-gray-500 border-separate border-spacing-2">
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
                    $message = $data ? $data->message ?? 'No message' : 'No message';
                    $orderId = $data ? $data->order_id ?? null : null;
                    $type = $notification->type;
                @endphp
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $message }}</td>
                    <td class="px-6 py-4">{{ $notification->created_at->format('d/m/Y H:i') }}</td>

                    <!-- thông báo đã nhận được hàng -->
                    @if (trim($message) === 'Đơn hàng của bạn đã được giao cho người nhận.')
                        <td class="px-6 py-4">
                            <form action="{{ route('clients.notifications.confirmReceived', $notification->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Đã nhận</button>
                            </form>
                        </td>
                    @endif


                    {{-- hiển thị nút hủy đơn hàng --}}
                    @if (trim($type) === 'đã đặt hàng')
                        <td class="px-6 py-4">
                            <form action="{{ route('clients.notifications.cancelOrder', $notification->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hủy đơn</button>
                            </form>
                            
                        </td>
                    @endif

                    {{-- hiển thị bị kháo tài khoản --}}
                    @if (trim($message) === 'Chúng tôi đã nhận thấy 1 số hành động lại từ tài khoản của bạn nên đã tạm thời khóa nó . Vui lòng liên hệ qua trang chat')
                    <td class="px-6 py-4">
                        <form action="{{ route('clients.chats.index', ['userId' => auth()->user()->id]) }}" method="GET">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Chat với admin</button>
                        </form>
                    </td>
                   @endif



                    <!-- Hiển thị trạng thái đã đọc/chưa đọc -->
                    <td class="px-6 py-4">
                        @if (!$notification->is_read)
                            <span class="text-red-500">Chưa đọc</span>
                            <!-- Đánh dấu là đã đọc -->
                            <form action="{{ route('clients.notifications.markAsRead', $notification->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-blue-500 hover:text-blue-700">Đánh dấu là đã đọc</button>
                            </form>
                        @else
                            <span class="text-green-500">Đã đọc</span>
                        @endif
                    </td>

                    <!-- Xóa thông báo -->
                    <td class="px-6 py-4">
                        <form action="{{ route('clients.notifications.delete', $notification->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('clients.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Quay lại</a>
    @else
        <div role="alert" class="bg-red-100 border border-red-400 text-red-700 rounded px-4 py-3">
            <p class="font-bold">Thông báo</p>
            <p>Không có thông báo nào.</p>
        </div>
    @endif
</div>

@endsection
