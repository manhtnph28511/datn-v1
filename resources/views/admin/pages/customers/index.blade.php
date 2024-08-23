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
                                        <td class="px-6 py-4">
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Người
                                                dùng
                                            </span>

                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Người dùng</span>
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
