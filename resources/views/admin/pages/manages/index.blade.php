@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
              
                {{-- Form tìm kiếm --}}
                <h3>Tìm kiếm người dùng</h3>
                <form action="{{ route('admin.manage.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Tìm kiếm...">
                    <button type="submit">Tìm kiếm</button>
                </form>
                <a href="{{route('admin.manage.create')}}">thêm tài khoản admin</a>
                <a href="{{route('admin.manage.trashed')}}">tài khoản đã bị xóa</a>
                {{-- Table --}}
                <h3>thông tin admin</h3>
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
                                            <a href="{{route('admin.manage.edit',$mas->id)}}">cập nhật</a>
                                            <form action="{{ route('admin.manage.destroy', $mas->id) }}" method="POST">
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
    </div>
@endsection
