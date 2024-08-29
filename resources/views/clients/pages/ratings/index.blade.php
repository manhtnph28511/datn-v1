<!-- resources/views/admin/pages/ratings/index.blade.php -->
@extends('clients.layouts.app')

@section('app')
<div class="dash-content">
    <h4>Quản lý Đánh giá</h4>
    
    <!-- Hiển thị thông báo thành công nếu có -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hiển thị các đánh giá -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sản phẩm</th>
                <th>Đánh giá</th>
                <th>Bình luận</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ratings as $rating)
                <tr>
                    <td>{{ $rating->id }}</td>
                    <td>{{ $rating->product->name ?? 'Sản phẩm không xác định' }}</td>
                    <td>{{ $rating->rating }} Sao</td>
                    <td>{{ $rating->review }}</td>
                    <td>{{ $rating->created_at->format('d-m-Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('clients.ratings.edit', $rating->id) }}" class="btn btn-warning">Cập nhật</a>
                         <form action="{{ route('clients.ratings.destroy', $rating->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đánh giá này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form> 
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Chưa có đánh giá nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
