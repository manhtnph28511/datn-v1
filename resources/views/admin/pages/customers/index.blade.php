@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
               
           
                {{-- Form tìm kiếm --}}
                <h3>Tìm kiếm người dùng</h3>
                <form action="{{ route('admin.customer.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Tìm kiếm theo tên, email hoặc ngày tạo">
                    <button type="submit">Tìm kiếm</button>
                </form>

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                
                <h3>Người dùng</h3>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tên
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Địa chỉ
                                </th>
                                <th scope="col" class="px-6 py-3">
                                   thời gian tạo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quyền hạn
                                </th>
                                <th scope="col" class="px-6 py-3 w-[300px]">
                                    Hành động
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $cus)
                                @if ($cus->role == 0)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td scope="row" class="px-6 py-4">
                                            {{ $cus->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $cus->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $cus->address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $cus->created_at	 }}
                                        </td>
                                        <td class="px-6 py-4 table-cell-nowrap">
                                            <span class="badge">Người dùng</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($cus->status == 1)
                                                <span class="text-green-600">Kích hoạt</span>
                                            @else
                                                <span class="text-red-600">Hủy kích hoạt</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($cus->status == 1)
                                                <a href="{{ route('admin.customer.deactivate', $cus->id) }}" class="text-red-600">Hủy kích hoạt</a>
                                            @else
                                                <a href="{{ route('admin.customer.activate', $cus->id) }}" class="text-green-600">Kích hoạt</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    <style>
    /* Định kiểu cho form tìm kiếm */
    form {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem; /* Khoảng cách dưới form */
    }

    input[type="text"] {
        flex: 1;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        color: #374151;
        margin-right: 1rem;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus {
        border-color: #2563eb; /* Màu viền khi focus */
        outline: none;
    }

    button {
        padding: 0.75rem 1.5rem;
        background-color: #2563eb; /* Màu nền nút */
        color: #ffffff; /* Màu chữ */
        border: none;
        border-radius: 0.375rem; /* Bo góc */
        font-size: 0.875rem; /* Kích thước chữ */
        font-weight: 500; /* Độ dày chữ */
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s; /* Hiệu ứng chuyển tiếp */
    }

    button:hover {
        background-color: #1d4ed8; /* Màu nền khi hover */
        transform: scale(1.05); /* Phóng to khi hover */
    }

    button:focus {
        outline: none; /* Xóa outline khi nút được chọn */
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5); /* Tạo hiệu ứng khi focus */
    }

    /* Định kiểu cho thông báo thành công */
    .alert-success {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 0.375rem;
        background-color: #d1fae5; /* Màu nền của thông báo thành công */
        color: #065f46; /* Màu chữ của thông báo thành công */
        border: 1px solid #d1fae5; /* Viền của thông báo thành công */
    }
    .table-cell-nowrap {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .badge {
        display: inline-block;
        background-color: #d1fae5; /* Màu nền của badge */
        color: #065f46; /* Màu chữ của badge */
        padding: 0.25rem 0.75rem;
        border-radius: 0.375rem;
        font-size: 0.75rem; /* Kích thước chữ của badge */
        font-weight: 500; /* Độ dày chữ của badge */
        text-align: center;
    }   
</style>

</style>
