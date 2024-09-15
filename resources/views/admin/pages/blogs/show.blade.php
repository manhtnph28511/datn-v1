@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-6">
                <div class="flex justify-end my-4">
                   <h2 class="text-lg font-semibold">Chi tiết bài viết</h2>
                </div>
                
                <div class="relative overflow-x-auto">
                    @if($blog) <!-- Kiểm tra nếu $blog tồn tại -->
                        <table class="min-w-full bg-white border border-gray-300 shadow-md">
                            <thead>
                                <tr>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">ID</th>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">Tên</th>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">Hình ảnh sản phẩm</th>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">Nội dung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-gray-50">
                                    <td class="border-b px-6 py-4 text-sm text-gray-700">{{ $blog->id }}</td>
                                    <td class="border-b px-6 py-4 text-sm text-gray-700">{{ $blog->name }}</td>
                                    <td class=""> <img src="{{  $blog->product->image }}" alt="" class="blog-image"></td>
                                    <td class="border-b px-6 py-4 text-sm text-gray-700">{{ $blog->content }}</td>
                                </tr>
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
