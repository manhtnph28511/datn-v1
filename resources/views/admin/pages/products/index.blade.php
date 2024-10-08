@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('admin.product.store') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+
                        Sản phẩm</a>
                </div>


                 {{-- Form tìm kiếm --}}
                 <h3>Tìm kiếm sản phẩm</h3>
                 <form action="{{ route('admin.product.search') }}" method="GET" class="flex mb-4">
                     <input type="text" name="query" placeholder="Tìm kiếm theo tên sản phẩm..." class="border border-gray-300 p-2 rounded-md">
                     <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2">
                         Tìm kiếm
                     </button>
                 </form>

                <div class="relative overflow-x-auto mb-8">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tên
                                </th>
                                <th scope="col" class="px-6 py-3 w-[150px]">
                                    Ảnh
                                </th>
                                <th scope="col" class="px-6 py-3 w-[150px]">
                                    Màu sắc
                                </th>
                                <th scope="col" class="px-6 py-3 w-[150px]">
                                    Size
                                </th>
                                <th scope="col" class="px-6 py-3 w-[150px]">
                                    Số lượng
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Hành động
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $pro)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white truncate">
                                        {{ $pro->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <img src="{{ $pro->image }}" alt="">
                                    </td>
                                    <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white truncate">
                                    {{ $pro->color->name  }}
                                </th>
                                <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white truncate">
                                {{ $pro->size->name  }}
                            </th>
                            <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white truncate">
                            {{ $pro->quantity  }}
                        </th>
                                

                                    <td class="px-6 py-4 flex gap-x-4">
                                        <a href="{{ route('admin.product.show', $pro->id) }}"
                                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
                                            Hiển thị
                                            <i class="fa-solid fa-eye"></i>
                                         </a>
                                        <a href="{{ route('admin.product.update', $pro->id) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                            Cập nhật
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        
                                            <!-- Nút để đến trang quản lý biến thể -->
                                            <a href="{{ route('admin.variant.index', ['product_id' => $pro->id]) }}" class="text-blue-500">Quản lý biến thể</a>
                                        
                                        <form action="{{ route('admin.product.destroy', $pro->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                                Xóa
                                                <i class="fa-solid fa-x"></i>
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
