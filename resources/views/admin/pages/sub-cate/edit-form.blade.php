@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <h3 class="text-gray-400 mb-4">Chỉnh sửa danh mục con</h3>
                <form method="POST" action="{{ route('admin.subcate.update', ['id' => $subCategory->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="name" id="name" value="{{ old('name', $subCategory->name) }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tên danh mục</label>
                        @error('name')
                            <p class="my-2 text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $subCategory->slug) }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="slug"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Slug</label>
                        @error('slug')
                            <p class="my-2 text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mô tả</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here...">{{ old('description', $subCategory->description) }}</textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Cập nhật
                    </button>
                   
                </form>
            </div>
        </div>
    </div>
@endsection

<style>
    
input, textarea {
    padding: 10px;
    font-size: 1rem;
    color: #333;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 15px;
    width: 100%;
    box-sizing: border-box;
    background-color: #f9f9f9;
}


input:focus, textarea:focus {
    border-color: #3b82f6; 
    background-color: #ffffff;
    outline: none;
    box-shadow: 0 0 8px rgba(59, 130, 246, 0.4); 
}


label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}


button {
    background-color: #3b82f6;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
}


button:hover {
    background-color: #2563eb; 
}


.text-red-400 {
    color: #f87171;
    font-size: 0.875rem;
    margin-top: 4px;
}

/* Dark mode */
.dark input, .dark textarea {
    background-color: #374151;
    border-color: #4b5563;
    color: #f9fafb;
}

.dark input:focus, .dark textarea:focus {
    background-color: #1f2937;
    border-color: #2563eb;
}

.dark label {
    color: #e5e7eb;
}

.dark button {
    background-color: #2563eb;
}

.dark button:hover {
    background-color: #1d4ed8;
}


@media (min-width: 640px) {
    .w-full {
        width: 100%;
    }

    .sm\\:w-auto {
        width: auto;
    }
}

</style>
