@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <h1>Danh sách biến thể sản phẩm</h1>
        {{-- <a href="{{ route('admin.variant.create,['product_id' => $product->id]') }}" class="btn btn-primary">Thêm biến thể mới</a> --}}
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
                            <img src="{{ asset('storage/' . $variant->image_variant) }}" alt="Variant Image" width="50px">
                            @else
                                Không có hình ảnh
                            @endif
                        </td>
                        <td>{{ $variant->color->name }}</td>
                        <td>{{ $variant->size->name }}</td>
                        <td>{{ $variant->quantity }}</td>
                        <td>{{ $variant->price }}</td>
                        
                        <td>
                            <a href="{{ route('admin.variant.edit', ['product_id' => $variant->product_id, 'variant_id' => $variant->id]) }}">
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
@endsection
