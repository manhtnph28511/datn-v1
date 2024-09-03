@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <h1>Danh sách biến thể sản phẩm</h1>
        <a href="{{ route('admin.variant.create', ['product_id' => $product->id]) }}" class="btn btn-primary">Thêm biến thể</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh sản phẩm</th>
                    <th>Hình ảnh biến thể</th>
                    <th>Màu</th>
                    <th>Kích thước</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($variants as $variant)
                    <tr>
                        <td>{{ $variant->id }}</td>
                        <td>{{ $variant->product->id }}</td>
                        <td>{{ $variant->product->name }}</td>
                        <td><img src="{{ $variant->product->image }}" alt="{{ $variant->product->name }}" width="50"></td>
                        <td>
                            @if($variant->image_variant)
                            <img src="{{$variant->image_variant }}" alt="Variant Image" width="50px">
                            @else
                                Không có hình ảnh
                            @endif
                        </td>
                        <td>{{ $variant->color->name }}</td>
                        <td>{{ $variant->size->name }}</td>
                        <td>
                            <span class="quantity" data-id="{{ $variant->id }}">
                                {{ $variant->quantity < 0 ? 0 : $variant->quantity }}
                            </span>
                        </td>
                        <td>{{ $variant->price }}</td>
                        
                        <td>
                            <a href="{{ route('admin.variant.edit', ['product_id' => $variant->product_id, 'variant_id' => $variant->id]) }}" class="btn btn-edit">
                                Sửa
                            </a>
                            <form action="{{ route('admin.variant.destroy', $variant->id) }}" method="POST" style="display:inline-block">
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
    <a href="{{ route('admin.product.index') }}" class="btn btn-back">Quay lại</a>
@endsection



<style>
    .btn {
        margin-bottom: 15px;
        padding: 10px 15px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        color: #fff;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s, border-color 0.3s;
    }
    
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    
    .btn-back {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    
    .btn-back:hover {
        background-color: #5a6268;
        border-color: #4e555b;
    }
    .btn-edit {
        background-color: #28a745;
        border-color: #28a745;
    }
    
    .btn-edit:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.quantity').forEach((element) => {
            let quantity = parseInt(element.textContent, 10);
            if (quantity < 0) {
                element.textContent = 0;
            }
        });
    });
</script>
<style>
    .dash-content {
        padding: 20px;
        background-color: #f8f9fa;
    }
    
    h1 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #343a40;
    }
    
    .btn {
        margin-bottom: 15px;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    
    .table thead th {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        text-align: left;
    }
    
    .table tbody td {
        padding: 10px;
        vertical-align: middle;
    }
    
    .table img {
        border-radius: 4px;
    }
    
    .table img[alt="Variant Image"] {
        max-width: 100px; /* Điều chỉnh kích thước hình ảnh biến thể */
    }
    
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
    }
    
    form {
        display: inline;
    }
    
</style>