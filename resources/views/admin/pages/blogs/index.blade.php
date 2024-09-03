@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-6">
                <div class="flex justify-end my-4">
                    <a href="{{ route('admin.blogs.create') }}"
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 mx-2 rounded-md">+ Thêm bài viết</a>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-start mb-4 space-y-4 md:space-y-0">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold mb-2">Tìm kiếm theo tên</h3>
                        <form action="{{ route('admin.blogs.index') }}" method="GET" class="flex items-center space-x-2">
                            <input type="text" id="name" name="status" value="{{ request('name') }}" placeholder="Tìm kiếm theo tên"
                                class="border border-gray-300 p-2 rounded-md text-sm w-64">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm">
                                Tìm kiếm
                            </button>
                        </form>
                    </div>
                </div>


                <form action="{{ route('admin.blogs.index') }}" method="GET" class="space-y-4 mb-6">
                    <div class="flex items-center space-x-4">
                        <div class="flex-1">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Từ ngày</label>
                            <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}" 
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                
                        <div class="flex-1">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Đến ngày</label>
                            <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}" 
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                       
                            <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm" style="height:40px">
                            Tìm kiếm
                        
                    </div>
                    </div>
                </form>
                
            

                <div class="relative overflow-x-auto">
                    @if($blogs->count())
                        <table class="min-w-full bg-white border border-gray-300 shadow-md">
                            <thead>
                                <tr>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">ID</th>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">Tên</th>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">Hình ảnh sản phẩm</th>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">Nội dung</th>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border-b px-6 py-4 text-sm text-gray-700">{{ $blog->id }}</td>
                                        <td class="border-b px-6 py-4 text-sm text-gray-700">{{ $blog->name }}</td>
                                        <td class=""> <img src="{{  $blog->product->image }}" alt="" class="blog-image"></td>
                                       
                                        <td class="border-b px-6 py-4 text-sm text-gray-700">{{ Str::limit($blog->content, 50) }}</td>
                                        <td class="border-b px-6 py-4 text-sm text-gray-700">
                                            <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-md text-xs">Sửa</a>
                                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md text-xs">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div role="alert" class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-exclamation-circle text-red-600"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium">Không có dữ liệu, vui lòng thêm mới!</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
   
form {
    margin-bottom: 1.5rem;
}


.flex {
    display: flex;
    flex-wrap: wrap; 
}


.flex-1 {
    flex: 1; 
    min-width: 0; /
    margin-right: 1rem; 
}



label {
    display: block;
    margin-bottom: 0.25rem; 
    font-size: 0.875rem; 
    font-weight: 500;
    color: #4a5568; 
}



form {
    margin-bottom: 1.5rem; 
}


.flex {
    display: flex;
    align-items: center; 
    flex-wrap: wrap; 
}


.flex-1 {
    flex: 1; 
    min-width: 0; 
    margin-right: 1rem; 
}


input[type="date"] {
    width: 100%; 
    height: 45px;
    padding: 0.5rem; 
    border: 1px solid #d1d5db; 
    border-radius: 0.375rem;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); 
    font-size: 0.875rem; 
    color: #4a5568; 
    background-color: #fff; 
    margin-bottom: 0.5rem; 
}


button {
    background-color: #3182ce;
    color: #fff; 
    padding: 0.5rem 1rem; 
    border: none; 
    border-radius: 0.375rem; 
    cursor: pointer; 
    font-size: 0.875rem; /
    font-weight: 600; 
    transition: background-color 0.2s ease-in-out;
}


button:hover {
    background-color: #2b6cb0; 
}

label {
    display: block;
    margin-bottom: 0.25rem; 
    font-size: 0.875rem; 
    font-weight: 500; 
    color: #4a5568; 
}
.blog-image {
    max-width: 75px; 
    max-height: 75px; 
    width: auto; 
    height: auto; 
    object-fit: cover; 
}
</style>
