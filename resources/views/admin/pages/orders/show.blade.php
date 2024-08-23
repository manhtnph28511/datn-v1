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

                <div class="bg-white p-6 rounded-lg shadow-md">
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
                                đang đóng gói</option>
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
                    <a href="{{ route('admin.order.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                        Trở về
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
       
        // $('#update_delivery_status').on('change', function() {
        //     var order_id = {{ $order->id }};
        //     var status = $('#update_delivery_status').val();
        //     $.post('{{ route('admin.orders.update_delivery_status') }}', {
        //         _token: '{{ @csrf_token() }}',
        //         order_id: order_id,
        //         status: status
        //     }, function(data) {
        //         Swal.fire({
        //             icon: 'success',
        //             title: 'Trạng thái vận chuyển được cập nhật thành công',
        //             showConfirmButton: false,
        //             timer: 1500
        //         });
        //         window.location.reload();
        //     });
        // });

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
