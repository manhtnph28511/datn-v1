@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="relative overflow-x-auto mb-8">
                    @if ($notifications->count() > 0)
                        <h3>Danh sách thông báo</h3>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Tin nhắn</th>
                                    <th scope="col" class="px-6 py-3">Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $notification)
                                    @php
                                        $data = json_decode($notification->data);
                                        $message = $data ? $data->message ?? 'No message' : 'No message';
                                    @endphp
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $message }}</td>
                                        <td class="px-6 py-4">{{ $notification->created_at }}</td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('admin.notifications.mark-as-read', $notification->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="text-blue-500 hover:text-blue-700">Đánh dấu là đã đọc</button>
                                            </form>
                                            <form action="{{ route('admin.notifications.delete', $notification->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
            </div>
        </div>
    </div>
@endsection
