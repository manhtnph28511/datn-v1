@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        {{-- Form tìm kiếm --}}
        <div class="mb-4">
            <form action="{{ route('admin.order.search') }}" method="GET">
                <input type="text" name="search" placeholder="Tìm kiếm theo tên, số điện thoại, hoặc email" value="{{ request('search') }}">
                
                <select name="note" class="border px-4 py-2 rounded-lg">
                    <option value="all">Tất cả trạng thái</option>
                    <option value="hoàn thành" {{ request('note') == 'hoàn thành' ? 'selected' : '' }}>hoàn thành</option>
                    <option value="đã hủy" {{ request('note') == 'đã hủy' ? 'selected' : '' }}>đã hủy</option>
                </select>
                
                <input type="date" name="start_date" value="{{ request('start_date') }}">
                <input type="date" name="end_date" value="{{ request('end_date') }}">
                
                <button type="submit">Tìm kiếm</button>
            </form>
            
        </div>
        <div class="activity">
            <div class="py-20">
                <div class="relative overflow-x-auto mb-8">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tên người dùng
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Số điện thoại
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Địa chỉ
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ghi chú
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ngày tạo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Hành động
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $order->id }}</td>
                                    <td class="px-6 py-4">{{ $order->username }}</td>
                                    <td class="px-6 py-4">{{ $order->email}}</td>
                                    <td class="px-6 py-4">{{ $order->phone }}</td>
                                    <td class="px-6 py-4">{{ $order->address }}</td>
                                    <td class="px-6 py-4">{{ $order->note }}</td>
                                    <td class="px-6 py-4">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4 flex gap-x-4">
                                        <a href="{{ route('admin.order.show', $order->id) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                            Chi tiết
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $orders->links('admin.layouts.pagination') }}
            </div>
        </div>
    </div>
@endsection
