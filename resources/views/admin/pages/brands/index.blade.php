@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="flex justify-end my-2">
                    <a href="{{ route('admin.brand.store') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+ Thương
                        hiệu</a>
                    <a class="bg-[#f687b3] hover:bg-[#f687b3] text-white font-bold py-2 px-4 rounded-full"
                        href="{{ route('admin.brand.trash') }}">
                        Thùng rác
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
                <div class="relative overflow-x-auto">
                    @if (count($brands) > 0)
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-[200px]">
                                        Thương hiệu
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Mô tả
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-[300px]">
                                        Hành động
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td scope="row" class="px-6 py-4">
                                            {{ $brand->name ?? '' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $brand->description ?? '' }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-x-4">
                                            <a href="{{ route('admin.brand.update', $brand->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                                Cập nhật
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <form action="{{ route('admin.brand.softDelete', $brand->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                                    Xóa
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                <i class="fa-solid fa-exclamation"></i>
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>Không tồn tại dữ liệu , vui lòng thêm mới!!</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            {{ $brands->links('admin.layouts.pagination') }}
        </div>
    </div>

    </section>

@endsection
