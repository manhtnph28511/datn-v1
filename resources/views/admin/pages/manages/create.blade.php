@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <h3>Tạo mới quản trị viên</h3>
                <form action="{{ route('admin.manage.store') }}" method="POST">
                    @csrf
                     @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Tên:</label>
                        <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mật khẩu:</label>
                        <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Địa chỉ:</label>
                        <input type="text" name="address" id="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.manage.index') }}" class="back-button">Quay lại</a>

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

    .alert {
        background-color: #fef2f2;
        border-color: #fda4af;
        color: #b91c1c;
        border-radius: 0.375rem;
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .alert ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .alert li {
        margin-bottom: 0.5rem;
    }

    label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: #4b5563;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        padding: 0.75rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        width: 100%;
        font-size: 0.875rem;
        color: #374151;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #2563eb;
        outline: none;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    button[type="submit"] {
        padding: 0.75rem 1.5rem;
        background-color: #2563eb;
        color: #ffffff;
        border: none;
        border-radius: 0.375rem;
        cursor: pointer;
        font-size: 0.875rem;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #1d4ed8;
    }

    a {
        display: inline-block;
        margin-top: 20px;
        color: #2563eb;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
    }

    a:hover {
        text-decoration: underline;
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
