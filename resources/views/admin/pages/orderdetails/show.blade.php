@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="relative overflow-x-auto mb-8">
                    @if ($orderDetails->count() > 0)
                        <h3>Chi tiết đơn hàng</h3>
                        @foreach ($orderDetails as $detail)
                            <div class="order-detail">
                                <div class="order-header">
                                    <h4>Đơn hàng #{{ $detail->order->id }}</h4>
                                </div>
                                <div class="order-body">
                                    <div class="order-row">
                                        <span class="order-label">Người đặt hàng:</span>
                                        <span class="order-value">{{ $detail->order->username ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Email:</span>
                                        <span class="order-value">{{ $detail->order->email ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Địa chỉ:</span>
                                        <span class="order-value">{{ $detail->order->address ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Số điện thoại:</span>
                                        <span class="order-value">{{ $detail->order->phone ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Tên sản phẩm:</span>
                                        <span class="order-value">{{ $detail->product->name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Ảnh sản phẩm:</span>
                                        <span class="order-value">
                                            @if($detail->image)
                                                <img src="{{ $detail->image }}" alt="" class="w-20 h-auto">
                                            @elseif ($detail->product->image)
                                                <img src="{{ $detail->product->image }}" alt="{{ $detail->product->name }}" class="w-20 h-auto">
                                            @else
                                                <p>Không có ảnh</p>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Size:</span>
                                        <span class="order-value">{{ $detail->size->name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Màu sắc:</span>
                                        <span class="order-value">{{ $detail->color->name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Số lượng:</span>
                                        <span class="order-value">{{ $detail->quantity ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Giá:</span>
                                        <span class="order-value">{{ $detail->price ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Tổng giá:</span>
                                        <span class="order-value">{{ $detail->total_price ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">PTTT:</span>
                                        <span class="order-value">{{ $detail->order->payment_method ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Trạng thái:</span>
                                        <span class="order-value">{{ $detail->order->order_status ?? 'N/A' }}</span>
                                    </div>
                                    <div class="order-row">
                                        <span class="order-label">Thời gian đặt hàng:</span>
                                        <span class="order-value">{{ $detail->created_at->format('d-m-Y H:i:s') ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                    <a href="{{ route('admin.orderdetail.index') }}" class="back-link">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    /* Định dạng cho tiêu đề bảng */
/* Định dạng cho tiêu đề chi tiết đơn hàng */
h3 {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

/* Định dạng cho phần chi tiết đơn hàng */
.order-detail {
    border: 1px solid #e5e7eb;
    border-radius: 0.375rem;
    padding: 1rem;
    margin-bottom: 1rem;
    background-color: #ffffff;
}

.order-header h4 {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.order-body {
    padding: 0.5rem;
}

.order-row {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 0;
    border-bottom: 1px solid #e5e7eb;
}

.order-row:last-child {
    border-bottom: none;
}

.order-label {
    font-weight: bold;
}

.order-value {
    font-weight: normal;
}

/* Định dạng cho ảnh sản phẩm */
img {
    max-width: 100px; /* Đặt chiều rộng tối đa cho ảnh */
    height: auto; /* Đảm bảo tỷ lệ khung hình không bị biến dạng */
}

/* Định dạng cho thông báo lỗi */
div[role="alert"] {
    margin-top: 1rem;
    padding: 1rem;
    border-radius: 0.375rem;
}

.bg-red-500 {
    background-color: #f87171;
}

.bg-red-100 {
    background-color: #fee2e2;
}

.text-white {
    color: #ffffff;
}

.text-red-700 {
    color: #b91c1c;
}

.font-bold {
    font-weight: 700;
}

.rounded-t {
    border-top-left-radius: 0.375rem;
    border-top-right-radius: 0.375rem;
}

.rounded-b {
    border-bottom-left-radius: 0.375rem;
    border-bottom-right-radius: 0.375rem;
}

.border {
    border: 1px solid;
}

.border-red-400 {
    border-color: #fca5a5;
}

/* Định dạng cho liên kết quay lại */
.back-link {
    display: inline-block;
    margin-top: 1rem;
    padding: 0.5rem 1rem;
    background-color: #3b82f6;
    color: #ffffff;
    font-weight: 700;
    border-radius: 0.375rem;
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.back-link:hover {
    background-color: #2563eb;
    transform: scale(1.05);
}

.back-link:active {
    background-color: #1d4ed8;
    transform: scale(0.95);
}

</style>
