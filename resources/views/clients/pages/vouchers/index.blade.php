@extends('clients.layouts.app')

@section('app')
<div class="container">
    <h1>Danh Sách Voucher</h1>
    
    @if($vouchers->isEmpty())
        <p>Không có voucher nào.</p>
    @else
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <table class="table">
            <thead>
                <tr>
                    <th>Mã Voucher</th>
                    <th>Giảm Giá</th>
                    <th>Thời Gian Bắt Đầu</th>
                    <th>Thời Gian Kết Thúc</th>
                    <th>Sản Phẩm Áp Dụng</th>
                    <th>Số Lượt Dùng Còn Lại</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                    <tr>
                        <td>{{ $voucher->code }}</td>
                        <td>
                            @if($voucher->discount_type === 'percentage')
                                {{ $voucher->discount }}%
                            @else
                                {{ number_format($voucher->discount) }} VND
                            @endif
                        </td>
                        <td>{{ $voucher->starts_at->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $voucher->expires_at->format('d-m-Y H:i:s') }}</td>
                        <td>
                                @if($voucher->product_id)
                                    {{ $voucher->product->name ?? 'Sản phẩm không tồn tại' }}
                                @else
                                    Tất cả sản phẩm
                                @endif
                        </td>
                        <td>{{ max(0, $voucher->quantity - $voucher->usage_count) }}</td>
                        <td>
                            <form action="{{ route('clients.vouchers.save', ['voucherId' => $voucher->id, 'id' => Auth::id()]) }}" method="POST">
                                @csrf
                                <button type="submit">Lưu Voucher</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
