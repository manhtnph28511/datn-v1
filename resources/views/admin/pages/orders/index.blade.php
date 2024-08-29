@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        {{-- Form tìm kiếm --}}
        <div class="mb-4">
            <form action="{{ route('admin.order.search') }}" method="GET">
                <input type="text" name="search" placeholder="Tìm kiếm theo tên, số điện thoại, hoặc email" value="{{ request('search') }}">
                
                <select name="order_status" class="border px-4 py-2 rounded-lg">
                    <option value="all">Tất cả trạng thái</option>
                    <option value="pending" {{ request('order_status') == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                    <option value="success" {{ request('order_status') == 'success' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="cancel" {{ request('order_status') == 'cancel' ? 'selected' : '' }}>Đã hủy</option>
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
                                    PTTT
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ngày tạo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Trạng thái
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
                                    <td class="px-6 py-4">{{ $order->payment_method }}</td>
                                    <td class="px-6 py-4">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4">{{ $order->order_status }}</td>
                                    <td class="px-6 py-4 flex gap-x-4">
                                        <a href="{{ route('admin.order.show', $order->id) }}">
                                            <span>Cập nhật trạng thái đơn hàng</span>
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

<style>
   
.bg-blue-500 {
    background-color: #3b82f6; 
}

.bg-blue-500:hover {
    background-color: #2563eb; 
}

.text-white {
    color: #ffffff; 
}

.font-bold {
    font-weight: 700; 
}

.py-2 {
    padding-top: 0.5rem; 
    padding-bottom: 0.5rem; 
}

.px-4 {
    padding-left: 1rem; 
    padding-right: 1rem; 
}

.rounded-full {
    border-radius: 9999px; 
}

.flex {
    display: flex; 
}

.gap-x-4 {
    gap: 1rem; 
}


/* Định dạng cho liên kết trong ô bảng */
td a {
    display: inline-flex; /* Sử dụng flexbox để dễ căn chỉnh */
    flex-direction: column; /* Sắp xếp nội dung theo cột */
    justify-content: center; /* Căn giữa nội dung theo chiều dọc */
    align-items: center; /* Căn giữa nội dung theo chiều ngang */
    padding: 0.5rem 1rem; /* Padding cho nút */
    border-radius: 0.375rem; /* Bo góc với bán kính nhỏ để tạo hình chữ nhật */
    background-color: #3b82f6; /* Màu nền chính của nút */
    color: #ffffff; /* Màu chữ của nút */
    font-weight: 700; /* Chữ đậm */
    text-decoration: none; /* Bỏ gạch chân */
    text-align: center; /* Căn giữa chữ */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Hiệu ứng chuyển màu nền và hiệu ứng phóng to khi di chuột qua */
    height: 60px; /* Chiều cao cố định */
    width: 150px; /* Chiều rộng cố định */
}

td a:hover {
    background-color: #2563eb; /* Màu nền khi di chuột qua */
    transform: scale(1.05); /* Hiệu ứng phóng to khi di chuột qua */
}

td a:active {
    background-color: #1d4ed8; /* Màu nền khi nhấn */
    transform: scale(0.95); /* Hiệu ứng thu nhỏ khi nhấn */
}


</style>
