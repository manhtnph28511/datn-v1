@extends('clients.layouts.app')

@section('app')
    <div class="profile-container">
        <h1>Voucher của bạn</h1>

    @if ($vouchers->isEmpty())
        <p>Hiện tại bạn không có voucher nào.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>ID Voucher</th>
                <th>Mã Voucher</th>
                <th>Giảm Giá</th>
                <th>Bắt Đầu</th>
                <th>Kết Thúc</th>
                <th>Số Lượt Còn Lại</th>
                <th>Sản Phẩm Áp Dụng</th>
                <th>Ngày Nhận</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vouchers as $userVoucher)
                <tr>
                    <td>{{ $userVoucher->voucher_id }}</td>
                    <td>{{ $userVoucher->voucher->code }}</td>
                    <td>
                        @if($userVoucher->voucher->discount_type === 'percentage')
                            {{ $userVoucher->voucher->discount }}%
                        @else
                            {{ number_format($userVoucher->voucher->discount) }} VND
                        @endif
                    </td>
                    <td>{{ $userVoucher->voucher->starts_at->format('d-m-Y') }}</td>
                    <td>{{ $userVoucher->voucher->expires_at->format('d-m-Y') }}</td>
                    <td>{{ max(0, $userVoucher->voucher->quantity - $userVoucher->voucher->usage_count) }}</td>
                    <td>
                        @if($userVoucher->voucher->product_id)
                            {{ $userVoucher->voucher->product->name ?? 'Sản phẩm không tồn tại' }}
                        @else
                            Tất cả sản phẩm
                        @endif
                    </td>
                    <td>{{ $userVoucher->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    </div>
@endsection