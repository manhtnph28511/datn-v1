<!-- resources/views/admin/vouchers/edit.blade.php -->

@extends('admin.layouts.app')

@section('title', 'Edit Voucher')

@section('app')
    <div class="dash-content">
        <h1>Edit Voucher</h1>

        <form action="{{ route('admin.vouchers.update', $voucher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="code">Voucher Code:</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $voucher->code) }}" required>
            </div>

            <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="number" name="discount" id="discount" class="form-control" step="0.01" value="{{ old('discount', $voucher->discount) }}" required>
            </div>

            <div class="form-group">
                <label for="discount_type">Discount Type:</label>
                <select name="discount_type" id="discount_type" class="form-control" required>
                    <option value="percentage" {{ $voucher->discount_type === 'percentage' ? 'selected' : '' }}>Giảm giá phần trăm (%)</option>
                    <option value="fixed" {{ $voucher->discount_type === 'fixed' ? 'selected' : '' }}>Giảm giá theo số tiền</option>
                </select>
            </div>

            <div class="form-group">
                <label for="starts_at">Start Date:</label>
                <input type="date" name="starts_at" id="starts_at" class="form-control" value="{{ old('starts_at', $voucher->starts_at->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="expires_at">Expiry Date:</label>
                <input type="date" name="expires_at" id="expires_at" class="form-control" value="{{ old('expires_at', $voucher->expires_at->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="product_id">Product:</label>
                <select name="product_id" id="product_id" class="form-control">
                    <option value="">Select a product (optional)</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $voucher->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Voucher</button>
        </form>
    </div>
    <a href="{{route('admin.vouchers.index')}}"><- Quay lại</a>
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

</style>
