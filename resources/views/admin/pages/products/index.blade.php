@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('admin.product.store') }}"
                       class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">
                        + Sản phẩm
                    </a>
                    <a href="{{ route('admin.product.trash') }}"
                       class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-full">
                        Thùng rác
                        <i class="fa-solid fa-trash ml-2"></i>
                    </a>
                </div>

                {{-- Form tìm kiếm --}}
                <h3 class="text-lg font-semibold mb-2">Tìm kiếm sản phẩm</h3>
                <form action="{{ route('admin.product.search') }}" method="GET" class="flex mb-4">
                    <input type="text" name="query" placeholder="Tìm kiếm theo tên sản phẩm..." 
                           class="border border-gray-300 p-2 rounded-md flex-1">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2">
                        Tìm kiếm
                    </button>
                </form>

                <div class="relative overflow-x-auto mb-8 shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Tên</th>
                                <th scope="col" class="px-6 py-3 w-36">Ảnh</th>
                                <th scope="col" class="px-6 py-3 w-36">Màu sắc</th>
                                <th scope="col" class="px-6 py-3 w-36">Size</th>
                                <th scope="col" class="px-6 py-3">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $pro)
                                <tr class="bg-white border-b hover:bg-gray-100">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap truncate">{{ $pro->name }}</td>
                                    <td class="px-6 py-4">
                                        <img src="{{ $pro->image }}" alt="{{ $pro->name }}" class="w-20 h-20 object-cover rounded-md">
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap truncate">{{ $pro->color->name }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap truncate">{{ $pro->size->name }}</td>
                                    <td class="px-6 py-4 flex space-x-4">
                                        <a href="{{ route('admin.product.update', $pro->id) }}"
                                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                            Cập nhật
                                            <i class="fa-solid fa-pen ml-2"></i>
                                        </a>
                                        <form action="{{ route('admin.product.softDelete', $pro->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                                Xóa
                                                <i class="fa-solid fa-x ml-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $products->links('admin.layouts.pagination') }}
            </div>
        </div>
    </div>
@endsection
