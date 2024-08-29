@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <h3>Cập nhật quản trị viên</h3>
                <form action="{{ route('admin.manage.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Tên:</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mật khẩu (để trống nếu không thay đổi):</label>
                        <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Xác nhận mật khẩu:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Địa chỉ:</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cập nhật</button>
                    </div>
                </form>
                <a href="{{ route('admin.manage.index') }}" class="back-button">Quay lại</a>
            </div>
            
        </div>
    </div>
    
@endsection

<style>
    /* Định kiểu cho nút "Quay lại" */
    .back-button {
        margin-top: 10px;
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background-color: #2563eb; /* Màu nền */
        color: #ffffff; /* Màu chữ */
        border: none;
        border-radius: 0.375rem; /* Bo góc */
        text-align: center;
        text-decoration: none;
        font-size: 0.875rem; /* Kích thước chữ */
        font-weight: 500; /* Độ dày chữ */
        transition: background-color 0.3s, transform 0.2s; /* Hiệu ứng chuyển tiếp */
    }

    .back-button:hover {
        background-color: #1d4ed8; /* Màu nền khi hover */
        transform: scale(1.05); /* Phóng to khi hover */
    }

    .back-button:focus {
        outline: none; /* Xóa outline khi nút được chọn */
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5); /* Tạo hiệu ứng khi focus */
    }

    /* Định kiểu cho form */
    form {
        background-color: #f9fafb; /* Màu nền của form */
        padding: 1.5rem;
        border-radius: 0.375rem;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151; /* Màu chữ label */
    }

    .form-input {
        display: block;
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        color: #374151; /* Màu chữ input */
        transition: border-color 0.3s;
    }

    .form-input:focus {
        border-color: #2563eb; /* Màu viền khi focus */
        outline: none;
    }

    .form-button {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background-color: #2563eb; /* Màu nền nút */
        color: #ffffff; /* Màu chữ */
        border: none;
        border-radius: 0.375rem; /* Bo góc */
        font-size: 0.875rem; /* Kích thước chữ */
        font-weight: 500; /* Độ dày chữ */
        transition: background-color 0.3s, transform 0.2s; /* Hiệu ứng chuyển tiếp */
    }

    .form-button:hover {
        background-color: #1d4ed8; /* Màu nền khi hover */
        transform: scale(1.05); /* Phóng to khi hover */
    }
    .back-button {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background-color: #2563eb;
        color: #ffffff;
        border: none;
        border-radius: 0.375rem;
        text-align: center;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        transition: background-color 0.3s;
    }
</style>

