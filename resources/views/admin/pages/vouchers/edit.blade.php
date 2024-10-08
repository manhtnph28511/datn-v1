<!-- resources/views/admin/vouchers/edit.blade.php -->

@extends('admin.layouts.app')

@section('title', 'Edit Voucher')

@section('app')
    <div class="dash-content">
        <h1>Edit Voucher</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
         @endif



         @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
         @endif

        <form action="{{ route('admin.vouchers.update', $voucher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="code">Mã giảm giá:</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $voucher->code) }}" required>
            </div>

            <div class="form-group">
                <label for="discount">Giá:</label>
                <input type="number" name="discount" id="discount" class="form-control" step="0.01" value="{{ old('discount', $voucher->discount) }}" required>
            </div>

            <div class="form-group">
                <label for="discount_type">Loại giảm giá:</label>
                <select name="discount_type" id="discount_type" class="form-control" required>
                    <option value="percentage" {{ $voucher->discount_type === 'percentage' ? 'selected' : '' }}>Giảm giá phần trăm (%)</option>
                    <option value="fixed" {{ $voucher->discount_type === 'fixed' ? 'selected' : '' }}>Giảm giá theo số tiền</option>
                </select>
            </div>

            <div class="form-group">
                <label for="starts_at">Ngyaf bắt đầu:</label>
                <input type="date" name="starts_at" id="starts_at" class="form-control" value="{{ old('starts_at', $voucher->starts_at->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="expires_at">Ngày kết thúc:</label>
                <input type="date" name="expires_at" id="expires_at" class="form-control" value="{{ old('expires_at', $voucher->expires_at->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="usage_count">Số lượt đã dùng</label>
                <input type="number" name="usage_count" id="usage_count" class="form-control" value="{{ old('usage_count', $voucher->usage_count ?? 0) }}">
            </div>

            <div class="form-group">
                <label for="quantity">Số lượng:</label>
                <input type="number" name="quantity" id="quantity" class="form-control"  value="{{ old('quantity', $voucher->quantity) }}" required>
            </div>

            <div class="form-group">Sản phẩm:</label>
                <select name="product_id" id="product_id" class="form-control">
                    <option value="">Tất cả sản phẩm</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $voucher->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    <a href="{{ route('admin.vouchers.index') }}" class="btn btn-back"> Quay lại</a>

@endsection

<style>
body {
    font-family: Arial, sans-serif;
}

/* Dash Content */
.dash-content {
    padding: 20px;
    background-color: #f8f9fa;
}

/* Header */
.dash-content h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #343a40;
}

/* Form Group */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group input[type="date"],
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

/* Submit Button */
.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Link */
a {
    color: #007bff;
    text-decoration: none;
    margin-top: 15px;
    display: inline-block;
}

a:hover {
    text-decoration: underline;
}
.btn-back {
    display: inline-block;
    padding: 8px 12px;
    border: 1px solid #007bff;
    color: #007bff;
    background-color: transparent;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-back:hover {
    background-color: #007bff;
    color: #fff;
}


</style>
