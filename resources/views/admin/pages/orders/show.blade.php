@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="flex justify-between items-center">
                    <h3>Chi tiết đơn hàng #{{ $order->id }}</h3>
                    <a href="{{ route('admin.orders.downloadInvoice', $order->id) }}" class="btn btn-primary">
                        <i data-feather="download" width="18"></i>
                        Xuất hoá đơn
                    </a>
                </div>
                <div class="card-header border-b-0">
                    <div class="flex justify-between items-center space-y-3 md:space-y-0 md:space-x-3 flex-wrap">
                        <div class="flex-grow">
                            <h5 class="mb-0">Hoá đơn <span class="text-accent">INV{{ $order->id }}</span></h5>
                            <span class="text-muted">Thời gian tạo: {{ \Carbon\Carbon::parse($order->created_at) }}</span>
                        </div>
                               
                        </div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var deliveryStatusSelect = document.getElementById('update_delivery_status');
                            var paymentStatusSelect = document.getElementById('update_payment_status');

                            var selectedIndexDelivery = deliveryStatusSelect.selectedIndex;
                            for (var i = 0; i < selectedIndexDelivery; i++) {
                                deliveryStatusSelect.options[i].disabled = true;
                            }

                            var selectedIndexPayment = paymentStatusSelect.selectedIndex;
                            for (var j = 0; j < selectedIndexPayment; j++) {
                                paymentStatusSelect.options[j].disabled = true;
                            }
                        });
                    </script>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md" style="margin-top:-90px">
                    <p><strong>Tên người dùng:</strong> {{ $order->username }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                    <p><strong>Ghi chú:</strong> {{ $order->note }}</p>
                    <p><strong>PTTT:</strong> {{ $order->payment_method }}</p>
                    <p><strong>Ngày tạo:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <label class="form-label">Trạng thái vận chuyển</label>
                    <div class="input-group">
                        <select class="form-select select2" name="delivery_status" id="update_delivery_status">
                            <option value="" disabled>Trạng thái vận chuyển</option>
                            <option value="ORDERPLACE" @if ($order->shipment_status == 'ORDERPLACE') selected @endif>Đã được
                                tạo</option>
                            <option value="PACKED" @if ($order->shipment_status == 'PACKED') selected @endif>Đã nhận và
                                đang xử lí</option>
                            <option value="SHIPPED" @if ($order->shipment_status == 'SHIPPED') selected @endif>Đã được
                                vận chuyển</option>
                            <option value="INTRANSIT" @if ($order->shipment_status == 'INTRANSIT') selected @endif>Đang
                                trên đường đến chỗ bạn</option>
                            <option value="OUTFORDELIVERY" @if ($order->shipment_status == 'OUTFORDELIVERY') selected @endif>Đang
                                giao cho người nhận</option>
                            <option value="DELAYED" @if ($order->shipment_status == 'DELAYED') selected @endif>Gặp vấn đề trong quá trình vận chuyển</option>
                            <option value="CANCEL" @if ($order->shipment_status == 'CANCEL') selected @endif>Hủy đơn
                            </option>
                            <option value="DELIVERED" @if ($order->shipment_status == 'DELIVERED') selected @endif>Giao
                                hàng thành công</option>
                        </select>
                    </div>
                
            </div>
        </div>
       
        </div>
    </div>
    <a href="{{ route('admin.order.index') }}"
    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
        Quay lại
</a>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
       

        $('#update_delivery_status').on('change', function() {
    var order_id = {{ $order->id }};
    var status = $('#update_delivery_status').val();
    $.post('{{ route('admin.orders.update_delivery_status') }}', {
        _token: '{{ csrf_token() }}',
        order_id: order_id,
        status: status
    }, function(response) {
        if (response.success) {
            Swal.fire({
                icon: 'success',
                title: response.message,
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: response.message,
                showConfirmButton: true
            }).then(() => {
            $('#update_delivery_status').val(previousValue); // Khôi phục giá trị trước đó
        });
        }
    })
}); 
    </script>
@endsection

<style>
    /* Định dạng cho phần nội dung chính */
.dash-content {
    padding: 1.5rem;
}

/* Định dạng cho phần hoạt động */
.activity {
    background-color: #ffffff;
    border-radius: 0.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
}

/* Định dạng cho tiêu đề và nút xuất hoá đơn */
.activity .flex {
    margin-bottom: 1.5rem;
}

.activity h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #333333;
}

.btn-primary {
    display: inline-flex;
    align-items: center;
    background-color: #2563eb;
    color: #ffffff;
    border: none;
    border-radius: 0.375rem;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 500;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #1d4ed8;
}

.card-header {
    margin-bottom: 1.5rem;
}

.card-header h5 {
    font-size: 1.25rem;
    font-weight: 500;
    color: #374151;
}

.card-header .text-accent {
    color: #2563eb;
}

.card-header .text-muted {
    color: #6b7280;
}

/* Định dạng cho khối thông tin đơn hàng */
.bg-white {
    background-color: #ffffff;
    border-radius: 0.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
}

.bg-white p {
    margin-bottom: 1rem;
    font-size: 1rem;
    color: #333333;
}

.bg-white .form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.input-group {
    margin-bottom: 1rem;
}

.form-select {
    display: block;
    width: 100%;
    padding: 0.5rem;
    font-size: 1rem;
    color: #374151;
    border-radius: 0.375rem;
    border: 1px solid #d1d5db;
    background-color: #ffffff;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

.form-select:focus {
    border-color: #2563eb;
    outline: none;
}

/* Định dạng cho nút quay lại */
.bg-gray-500 {
    background-color: #6b7280;
}

.bg-gray-500:hover {
    background-color: #4b5563;
}

.bg-gray-500, .bg-gray-500:hover {
    color: #ffffff;
    padding: 0.5rem 1rem;
    border-radius: 9999px;
    font-weight: 700;
}

</style>
