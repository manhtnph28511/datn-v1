@extends('clients.layouts.app')



@section('app')
    <section id="order-details" class="section-p1">
        <h2>Chi tiết đơn hàng</h2>
        <div>
            @foreach ($order->orderDetails as $detail)
                <div class="order-info-row">
                    <p class="label"><strong>ID đơn hàng:</strong></p>
                    <p class="value">INV{{ $detail->id }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Thời gian tạo:</strong></p>
                    <p class="value">{{ \Carbon\Carbon::parse($detail->created_at)->format('d-m-Y H:i:s') }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Người đặt hàng:</strong></p>
                    <p class="value">{{ $detail->order->username }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Số điện thoại:</strong></p>
                    <p class="value">{{ $detail->order->phone }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Email:</strong></p>
                    <p class="value">{{ $detail->order->email }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Địa chỉ:</strong></p>
                    <p class="value">{{ $detail->order->address }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Ghi chú:</strong></p>
                    <p class="value">{{ $detail->order->note }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>ID sản phẩm:</strong></p>
                    <p class="value">{{ $detail->pro_id }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Tên sản phẩm:</strong></p>
                    <p class="value">{{ $detail->product->name }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Hình ảnh:</strong></p>
                    <p class="value"><img src="{{ $detail->product->image }}" alt="Image" width="100"></p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Kích thước:</strong></p>
                    <p class="value">{{ $detail->size->name }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Màu:</strong></p>
                    <p class="value">{{ $detail->color->name }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Giá:</strong></p>
                    <p class="value">{{ number_format($detail->price) }}đ</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Số lượng:</strong></p>
                    <p class="value">{{ $detail->quantity }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Tổng:</strong></p>
                    <p class="value">{{ number_format($detail->total_price) }}đ</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Trạng thái đơn hàng:</strong></p>
                    <p class="value">{{ $order->order_status }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Trạng thái vận chuyển:</strong></p>
                    <p class="value">{{ $order->shipment_status }}</p>
                </div>
                <div class="order-info-row">
                    <p class="label"><strong>Phương thức thanh toán:</strong></p>
                    <p class="value">{{ $order->payment_method }}</p>
                </div>
            @endforeach
        </div>
        <a href="{{ route('order.history') }}" class="btn btn-primary">Quay lại danh sách đơn hàng</a>
    </section>
@endsection
<style>
  
#order-details {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


#order-details h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}


.order-info-row {
    display: flex;
    margin: 10px 0;
    align-items: center;
}


.order-info-row p.label {
    flex: 1;
    color: #333;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}


.order-info-row p.value {
    flex: 2;
    margin: 0;
    color: #555;
}


#order-details img {
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}


#order-details .btn-primary {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    font-size: 16px;
    font-weight: bold;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

#order-details .btn-primary:hover {
    background-color: #0056b3;
}

</style>