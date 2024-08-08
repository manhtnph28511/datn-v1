@extends('admin.layouts.app')

@section('app')
<div class="dash-content">
    <div class="activity"> 
        <div class="py-20">
            <h3 class="text-gray-400 mb-4">Thêm Biến Thể Sản Phẩm</h3> 
            <form method="POST" action="{{ route('admin.variant.store', $product->id) }}" enctype="multipart/form-data">
                @csrf
                <!-- Other form fields -->

                <div class="relative z-0 w-full mb-6 group">
                    <label for="size_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chọn Kích Thước</label>
                    <select name="size_id" id="size_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                    @error('size_id')
                        <p class="my-2 text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <label for="color_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chọn Màu</label>
                    <select name="color_id" id="color_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                    @error('color_id')
                        <p class="my-2 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số Lượng</label>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('quantity')
                        <p class="my-2 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Giá</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('price')
                        <p class="my-2 text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hình Ảnh</label>
                    <input type="file" name="image_variant" id="image_variant" accept="image/*"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('image')
                        <p class="my-2 text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Thêm Biến Thể
                    </button>
                </div>
            </form>
        </div>
        <a href="{{ route('admin.variant.index', ['product_id' => $product_id]) }}">Quay lại</a>
    </div>
</div>
@endsection
