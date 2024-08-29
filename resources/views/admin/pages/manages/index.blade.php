@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="header-container">
                {{-- Form tìm kiếm --}}
                <div class="search-container">
                    <form action="{{ route('admin.manage.search') }}" method="GET">
                        <input type="text" name="query" placeholder="Tìm kiếm...">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </div>

                {{-- Links --}}
                <div class="links-container">
                    <a href="{{route('admin.manage.create')}}">Thêm tài khoản admin</a>
                    <a href="{{route('admin.manage.trashed')}}">Tài khoản đã bị xóa</a>
                </div>
            </div>

            {{-- Table --}}
            <h3>Thông tin admin</h3>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Tên</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Địa chỉ</th>
                            <th scope="col" class="px-6 py-3">Quyền hạn</th>
                            <th scope="col" class="px-6 py-3 w-[300px]">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manages as $mas)
                            @if ($mas->role == 1)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $mas->name }}</td>
                                    <td class="px-6 py-4">{{ $mas->email }}</td>
                                    <td class="px-6 py-4">{{ $mas->address }}</td>
                                    <td class="px-6 py-4">
                                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Quản trị viên</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('admin.manage.edit',$mas->id)}}">Cập nhật</a>
                                        <form action="{{ route('admin.manage.destroy', $mas->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


<style>
    .dash-content {
        padding: 20px;
        background-color: #f9fafb;
        min-height: 100vh;
    }

    .activity {
        margin-top: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .py-20 {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .search-container {
        display: flex;
        align-items: center;
    }

    form {
        display: flex;
        align-items: center;
    }

    input[type="text"] {
        padding: 8px;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        width: 200px; /* Giảm chiều rộng của trường nhập liệu */
        margin-right: 10px;
        font-size: 0.875rem; /* Giảm kích thước font */
    }

    button[type="submit"] {
        padding: 8px 16px;
        background-color: #2563eb;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.875rem; /* Giảm kích thước font */
    }

    button[type="submit"]:hover {
        background-color: #1d4ed8;
    }

    .links-container {
        display: flex;
        gap: 15px; /* Khoảng cách giữa các liên kết */
    }

    .links-container a {
        font-size: 0.875rem; /* Giảm kích thước font */
        color: #2563eb;
        text-decoration: none;
        background-color: #f3f4f6; /* Nền của các liên kết */
        padding: 8px 16px;
        border-radius: 4px;
        border: 1px solid #d1d5db;
    }

    .links-container a:hover {
        background-color: #e5e7eb;
        text-decoration: underline;
    }

    .relative {
        position: relative;
    }

    .overflow-x-auto {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: #f3f4f6;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    th {
        background-color: #e5e7eb;
        color: #374151;
        font-weight: 600;
    }

    tbody tr:hover {
        background-color: #f1f5f9;
    }

    .bg-green-100 {
        background-color: #d1fae5;
    }

    .text-green-800 {
        color: #065f46;
    }

    .bg-red-500 {
        background-color: #ef4444;
    }

    .text-white {
        color: #ffffff;
    }

    .rounded {
        border-radius: 4px;
    }

    .px-4 {
        padding-left: 16px;
        padding-right: 16px;
    }

    .py-2 {
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .w-[300px] {
        width: 300px;
    }
</style>