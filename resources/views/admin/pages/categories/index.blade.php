@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py10">

            </div>
            <div class="py-[100px]">
                <div class="block box-default">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('admin.category.create')  }}"
                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+
                          Thêm danh mục
                         </a>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tên
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-[200px]">
                                        Slug
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
                                @foreach ($cates as $cate)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td scope="row" class="px-6 py-4">
                                            {{ $cate->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $cate->slug }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $cate->description }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-x-4">
                                            <a href="{{ route('admin.category.update', $cate->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                                Cập nhật
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="{{ route('admin.subcate.index', ['categories_id' => $cate->id]) }}"
                                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full">
                                                Xem danh mục con
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.category.show', $cate->id) }}"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                                                Xem chi tiết
                                                <i class="fa-solid fa-info-circle"></i>
                                            </a>
                                            <form action="{{ route('admin.category.destroy', $cate->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                                    Xóa danh mục
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $cates->links('admin.layouts.pagination') }}
        </div>
    </div>
@endsection

