@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-6">
                <h3 class="text-lg font-semibold mb-4">Thêm bài viết</h3>
                <form action="{{ route('admin.blogs.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên bài viết</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                        <textarea id="content" name="content" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="product_id" class="block text-sm font-medium text-gray-700">Sản phẩm liên kết</label>
                        <select id="product_id" name="product_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Chọn sản phẩm</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Thêm</button>
                </form>
            </div>
            <a href="{{ route('admin.blogs.index') }}" class="back-link">
                <i class="fa-solid fa-arrow-left"></i>
                Quay lại
            </a>
        </div>
    </div>
@endsection

<style>
   
.dash-content {
    background-color: #f8f9fa; 
    padding: 20px;
}

.activity {
    background-color: #ffffff;
    border-radius: 0.375rem; 
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); 
    padding: 20px;
}

h3 {
    color: #333; 
}

label {
    display: block;
    font-size: 0.875rem; 
    color: #4a5568; 
    margin-bottom: 0.25rem;
}


input[type="text"], textarea, select {
    width: 100%; 
    padding: 0.5rem; 
    border-radius: 0.375rem; 
    border: 1px solid #e2e8f0; 
    box-sizing: border-box; 
    font-size: 0.875rem; 
    transition: border-color 0.2s; 
}


input:focus, textarea:focus, select:focus {
    border-color: #3182ce; 
    outline: none; 
    box-shadow: 0 0 0 1px rgba(49, 130, 206, 0.2); 
}


.text-red-500 {
    color: #f56565; 
}

.text-sm {
    font-size: 0.875rem; 
}


button {
    border: none; 
    border-radius: 0.375rem; 
    cursor: pointer;
    padding: 0.5rem 1rem; 
    font-size: 0.875rem;
    transition: background-color 0.2s; 
}

button:hover {
    background-color: #2b6cb0; 
}


.back-link {
    width: 130px;
    display: flex;
    align-items: center;
    color: #3182ce; 
    font-size: 0.875rem; 
    font-weight: 500;
    margin-bottom: 1rem; 
    text-decoration: none; 
    border: 1px solid #3182ce; 
    border-radius: 0.375rem;
    padding: 0.5rem 1rem; 
    transition: background-color 0.2s, color 0.2s; 
}

.back-link:hover {
    background-color: #ebf8ff;
    color: #2b6cb0; 
}

.back-link i {
    margin-right: 0.5rem; 
}

</style>
