@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">    
                <div class="relative overflow-x-auto mb-8">
                    @if ($orderDetails->count() > 0)
                        <h3>Chi tiết đơn hàng</h3>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Người đặt hàng</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Địa chỉ</th>
                                    <th scope="col" class="px-6 py-3">Số điện thoại</th>
                                    <th scope="col" class="px-6 py-3">Tên sản phẩm</th>
                                    <th scope="col" class="px-6 py-3">Ảnh sản phẩm</th>
                                    <th scope="col" class="px-6 py-3">Size</th>
                                    <th scope="col" class="px-6 py-3">Màu sắc</th>
                                    <th scope="col" class="px-6 py-3">Số lượng</th>
                                    <th scope="col" class="px-6 py-3">Giá</th>
                                    <th scope="col" class="px-6 py-3">Tổng giá</th>
                                    <th scope="col" class="px-6 py-3">PTTT</th>
                                    <th scope="col" class="px-6 py-3">Trạng thái</th>
                                    <th scope="col" class="px-6 py-3">Thời gian đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails as $detail)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $detail->order->username ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->order->email ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->order->address ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->order->phone ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->product->name ?? 'N/A' }}</td>
                                        <<td class="px-6 py-4">
                                            @if ($detail->product->image)
                                                <img src="{{ $detail->product->image }}" alt="{{ $detail->product->name }}" class="w-20 h-auto">
                                            @else
                                                <p>Không có ảnh</p>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">{{ $detail->size->name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->color->name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->quantity ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->price ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->total_price ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->order->payment_method ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->order->order_status ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">{{ $detail->created_at->format('d-m-Y H:i:s') ?? 'N/A' }}</td>
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
                                <p>Không tìm thấy chi tiết đơn hàng nào.</p>
                            </div>
                        </div>
                    @endif
                    <a href="{{route('admin.orderdetail.index')}}">quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
