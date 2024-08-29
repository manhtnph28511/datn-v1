@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <h1>Danh sách Voucher</h1>
        <a href="{{ route('admin.vouchers.create') }}" class="btn btn-primary">Thêm mới Voucher</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Mã</th>
                    <th>Giảm giá</th>
                    <th>Loại giảm giá</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>số lần đã sửu dụng</th>
                    <th>số lượng </th>
                    <th>Sản phẩm</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                    <tr>
                        <td>{{ $voucher->id }}</td>
                        <td>{{ $voucher->code }}</td>
                        <td>{{ number_format($voucher->discount) }}</td>
                        <td>
                            @if($voucher->discount_type == 'percentage')
                                Giảm giá phần trăm (%)
                            @elseif($voucher->discount_type == 'fixed')
                                Giảm giá theo số tiền
                            @else
                                Không xác định
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($voucher->starts_at)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($voucher->expires_at)->format('d/m/Y') }}</td>
                        <td>{{ $voucher->usage_count }}</td>
                        <td>{{ $voucher->quantity < 0 ? 0 : $voucher->quantity }}</td>
                        <td>
                            @if($voucher->product_id)
                                {{ $voucher->product->name }}
                            @elseif($voucher->product_id === null)
                                Tất cả sản phẩm
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.vouchers.edit', $voucher->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('admin.vouchers.destroy', $voucher->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
@endsection

<style>
    .dash-content {
    padding: 20px;
    font-family: Arial, sans-serif;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f4f4f4;
    font-weight: bold;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tr:hover {
    background-color: #f1f1f1;
}

.btn {
    padding: 8px 12px;
    border: none;
    color: #fff;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 4px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-warning {
    background-color: #ffc107;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
}

form {
    display: inline;
}

button {
    border: none;
    padding: 8px 12px;
    color: #fff;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    opacity: 0.8;
}

</style>