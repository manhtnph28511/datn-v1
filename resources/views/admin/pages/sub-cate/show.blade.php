@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <h3 class="text-gray-400 mb-4">Thông tin chi tiết danh mục con</h3>

            <div class="py-20">
                <a href="{{ route('admin.subcate.index', ['categories_id' => $subCategory->category->id]) }}"
                    class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 mb-4">
                    Quay lại danh sách danh mục con
                </a>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h4 class="text-xl font-bold">{{ $subCategory->name }}</h4>
                    <p class="text-gray-600"><strong>Slug:</strong> {{ $subCategory->slug }}</p>
                    <p class="text-gray-600"><strong>Mô tả:</strong> {{ $subCategory->description }}</p>
                    <p class="text-gray-600"><strong>Danh mục cha:</strong> {{ $subCategory->category->name }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
