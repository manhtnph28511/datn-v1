@extends('admin.layouts.app')

@section('app')
<div class="dash-content">
    <h1>Quản lý Đánh giá</h1>

    @if ($ratings->isEmpty())
        <p>Chưa có đánh giá nào.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Người dùng</th>
                    <th>Sản phẩm</th>
                    <th>Đánh giá</th>
                    <th>Nhận xét</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ratings as $rating)
                    <tr>
                        <td>{{ $rating->id }}</td>
                        <td>{{ $rating->user->name ?? 'Người dùng không xác định' }}</td>
                        <td>{{ $rating->product->name ?? 'Sản phẩm không xác định' }}</td>
                        <td>{{ $rating->rating }} Sao</td>
                        <td>{{ $rating->review }}</td>
                        <td>{{ $rating->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>
                            <form action="{{ route('admin.ratings.destroy', $rating->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đánh giá này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection