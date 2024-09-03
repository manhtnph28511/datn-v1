@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-6">
                <div class="flex justify-end my-4">
                    <a href="{{ route('admin.status.create') }}"
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 mx-2 rounded-md">+ Thêm trạng thái</a>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-start mb-4 space-y-4 md:space-y-0">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold mb-2">Tìm kiếm theo tên</h3>
                        <form action="{{ route('admin.status.search') }}" method="GET" class="flex items-center space-x-2">
                            <input type="text" id="name" name="status" value="{{ request('status') }}" placeholder="Tìm kiếm theo tên"
                                class="border border-gray-300 p-2 rounded-md text-sm w-64">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm">
                                Tìm kiếm
                            </button>
                        </form>
                    </div>
                </div>


                <div class="relative overflow-x-auto">
                    @if($statuses->count())
                        <table class="min-w-full bg-white border border-gray-300 shadow-md">
                            <thead>
                                <tr>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">ID</th>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">Trạng thái</th>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">Mô tả</th>
                                    <th class="border-b px-6 py-3 bg-gray-100 text-left text-sm font-medium text-gray-600">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statuses as $status)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border-b px-6 py-4 text-sm text-gray-700">{{ $status->id }}</td>
                                        <td class="border-b px-6 py-4 text-sm text-gray-700">{{ $status->status }}</td>
                                        <td class="border-b px-6 py-4 text-sm text-gray-700">{{ $status->description }}</td>
                                        <td class="border-b px-6 py-4 text-sm text-gray-700">
                                            <div class="table-actions flex space-x-2">
                                                <a href="{{ route('admin.status.edit', $status->id) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-md text-xs">Sửa</a>
                                                <form action="{{ route('admin.status.destroy', $status->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md text-xs">Xóa</button>
                                                </form>
                                            </div>
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

.dash-content {
    background-color: #f8f9fa;
    padding: 20px;
}

.table-actions button {
    margin-right: 0.5rem; 
}

.table-actions {
    display: flex;
    gap: 0.5rem; /* Khoảng cách giữa các nút */
}

.table-actions form {
    margin: 0; /* Đảm bảo không có khoảng cách thừa xung quanh form */
}

.table-actions button:last-child {
    margin-right: 0; 
}


.bg-green-500 {
    background-color: #48bb78;
}

.bg-green-600 {
    background-color: #38a169;
}

.bg-blue-500 {
    background-color: #4299e1;
}

.bg-blue-600 {
    background-color: #3182ce;
}

.bg-yellow-500 {
    background-color: #ecc94b;
}

.bg-yellow-600 {
    background-color: #d69e2e;
}

.bg-red-500 {
    background-color: #f56565;
}

.bg-red-600 {
    background-color: #e53e3e;
}

/* Hiệu ứng hover cho các button */
.bg-green-500:hover {
    background-color: #38a169;
}

.bg-blue-500:hover {
    background-color: #3182ce;
}

.bg-yellow-500:hover {
    background-color: #d69e2e;
}

.bg-red-500:hover {
    background-color: #e53e3e;
}


</style>