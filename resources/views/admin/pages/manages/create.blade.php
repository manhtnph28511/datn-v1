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
@endsection
