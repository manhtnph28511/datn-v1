@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">


                @if (session('error'))
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 mt-4">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Form tìm kiếm theo trạng thái --}}
                <form action="{{ route('admin.orderdetail.index') }}" method="GET" class="flex items-center gap-x-4">
                    <input type="text" name="search" placeholder="Tìm kiếm theo tên người đặt hàng" class="border px-4 py-2 rounded-lg" value="{{ request('search') }}">
                    <select name="status" class="border px-4 py-2 rounded-lg">
                        <option value="all">Tất cả trạng thái</option>
                        <option value="đang chờ xác nhận" {{ request('status') == 'đang chờ xác nhận' ? 'selected' : '' }}>đang chờ xác nhận</option>
                        <option value="đang xử lí" {{ request('status') == 'đang xử lí' ? 'selected' : '' }}>đang xử lí</option>
                        <option value="đang giao" {{ request('status') == 'đang giao' ? 'selected' : '' }}>đang giao</option>
                        <option value="hoàn thành" {{ request('status') == 'hoàn thành' ? 'selected' : '' }}>hoàn thành</option>
                        <option value="đã hủy" {{ request('status') == 'đã hủy' ? 'selected' : '' }}>đã hủy</option>
                    </select>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Tìm kiếm</button>
                </form>

                <div class="relative overflow-x-auto mb-8">
                    @if ($orderDetails->count() > 0)
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Người đặt hàng
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tên sản phẩm
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Size
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Màu sắc
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Số lượng
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Giá
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tổng giá
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Trạng thái
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Hành động
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails as $detail)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $detail->order->username }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $detail->product->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $detail->size->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $detail->color->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $detail->quantity }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $detail->price }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $detail->total_price }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $detail->type }}
                                        </td>
                                          <!-- Form để cập nhật trạng thái -->
                                          <td class="px-6 py-4 flex gap-x-4">
                                          <form action="{{ route('admin.orderdetail.updateType', $detail->id) }}" method="POST">
                                            @csrf
                                            <select name="type" class="form-select" required>
                                                <option value="đang chờ xác nhận" {{ $detail->type === 'đang chờ xác nhận ' ? 'selected' : '' }}>Đang chờ xác nhận</option>
                                                <option value="đang xử lí" {{ $detail->type === 'đang xử lí' ? 'selected' : '' }}>Đang xử lý</option>
                                                <option value="đang giao" {{ $detail->type === 'đang giao' ? 'selected' : '' }}>Đang giao</option>
                                                <option value="hoàn thành" {{ $detail->type === 'hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                                                <option value="đã hủy" {{ $detail->type === 'đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                                            </select>
                                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Cập nhật</button>
                                        </form>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                <i class="fa-solid fa-exclamation"></i>
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>Không tìm thấy chi tiết đơn hàng nào.</p>
                            </div>
                        </div>
                    @endif
                </div>
                {{ $orderDetails->links('admin.layouts.pagination') }} <!-- Hiển thị phân trang -->
            </div>
        </div>
    </div>
@endsection
