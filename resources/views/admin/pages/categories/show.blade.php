@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <h3 class="text-gray-400 mb-4">Chi tiết danh mục</h3>

            <div class="py-20">
                <div class="relative z-0 w-full mb-6 group">
                    <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Tên danh mục</label>
                    <p class="py-2 px-4 text-sm bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-white">
                        {{ $category->name }}
                    </p>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <label for="slug" class="block text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                    <p class="py-2 px-4 text-sm bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-white">
                        {{ $category->slug }}
                    </p>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <label for="description" class="block text-sm font-medium text-gray-900 dark:text-white">Mô tả</label>
                    <p class="py-2 px-4 text-sm bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-white">
                        {{ $category->description }}
                    </p>
                </div>

                <a href="{{ route('admin.category.index') }}"
                    class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Quay lại
                </a>
            </div>
        </div>
    </div>
@endsection
