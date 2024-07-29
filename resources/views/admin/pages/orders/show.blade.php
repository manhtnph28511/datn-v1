@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <h3>Chi tiết đơn hàng #{{ $order->id }}</h3>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p><strong>Tên người dùng:</strong> {{ $order->username }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                    <p><strong>Ghi chú:</strong> {{ $order->note }}</p>
                    <p><strong>Ngày tạo:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <a href="{{ route('admin.order.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                        Trở về
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection