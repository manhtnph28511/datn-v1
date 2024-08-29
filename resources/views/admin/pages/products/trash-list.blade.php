@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="flex justify-end mb-4">
                    <a class="bg-[#f687b3] hover:bg-[#f687b3] text-white font-bold py-2 px-4 rounded-full"
                        href="{{ route('admin.product.index') }}">
                        Quay lại
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tên
                                </th>
                                <th scope="col" class="px-6 py-3 w-[150px]">
                                    Ảnh
                                </th>
                                <th scope="col" class="px-6 py-3 w-[450px]">
                                    Mô tả
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
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $pro->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <img src="{{ $pro->image }}" alt="">
                                    </td>
                                    <td class="px-6 py-4">
                                        {!! $pro->description !!}
                                    </td>
                                    <td class="px-6 py-4 flex gap-x-4">
                                        <a href="{{ route('admin.product.restore', $pro->id) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                            Khôi phục
                                            <i class="fa-solid fa-arrow-rotate-left"></i>
                                        </a>
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

<style>
    /* General table styling */
table {
    border-collapse: collapse;
    width: 100%;
}

thead {
    background-color: #f3f4f6; /* Light gray background for header */
}

thead th {
    padding: 12px 15px;
    text-align: left;
    font-weight: bold;
    color: #4b5563; /* Dark gray text color */
}

tbody tr:nth-child(even) {
    background-color: #f9fafb; /* Alternate row colors */
}

tbody tr:nth-child(odd) {
    background-color: #ffffff; /* White background for odd rows */
}

tbody td {
    padding: 12px 15px;
    vertical-align: middle;
}

tbody td img {
    max-width: 100px; /* Set a max width for images */
    height: auto;
    border-radius: 5px; /* Rounded corners for images */
}

/* Button styling */
.bg-[#f687b3] {
    background-color: #f687b3;
}

.bg-[#f687b3]:hover {
    background-color: #e572a0;
}

.bg-blue-500 {
    background-color: #3b82f6;
}

.bg-blue-500:hover {
    background-color: #2563eb;
}

.bg-red-500 {
    background-color: #ef4444;
}

.bg-red-500:hover {
    background-color: #dc2626;
}

.text-white {
    color: #ffffff;
}

.font-bold {
    font-weight: bold;
}

.rounded-full {
    border-radius: 9999px; /* Full rounded corners */
}

.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

.px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
}

/* Pagination styling */
.pagination {
    display: flex;
    justify-content: center;
    padding: 1rem 0;
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 0.5rem 1rem;
    margin: 0 0.25rem;
    border-radius: 0.375rem;
    text-decoration: none;
    color: #4b5563; /* Dark gray text color */
    background-color: #f3f4f6; /* Light gray background */
}

.pagination a:hover {
    background-color: #e2e8f0; /* Slightly darker gray on hover */
}

.pagination .active {
    background-color: #3b82f6; /* Blue background for active page */
    color: #ffffff;
    font-weight: bold;
}

/* Responsive design */
@media (max-width: 768px) {
    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    th, td {
        display: block;
        text-align: right;
    }

    th::before {
        content: attr(data-label);
        float: left;
        font-weight: bold;
        color: #4b5563;
    }

    td {
        text-align: left;
        position: relative;
        padding-left: 50%;
    }

    td::before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 10px;
        font-weight: bold;
        color: #4b5563;
        white-space: nowrap;
    }
}

</style>
