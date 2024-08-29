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

<style>
    .dash-content {
    padding: 20px;
    font-family: Arial, sans-serif;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
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
    font-size: 14px;
}

button:hover {
    opacity: 0.8;
}

</style>