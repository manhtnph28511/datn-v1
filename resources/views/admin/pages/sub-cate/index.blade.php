@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity" >
                <h3 class="text-gray-400 mb-4">Danh sách danh mục con : {{ $categoryName }}</h3>
                <a href="{{ route('admin.category.index', ['categories_id' => $categories_id]) }}"
                    class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 mb-4">
                    Quay lại danh mục cha
                </a>
                
                <a href="{{ route('admin.subcate.create-form', ['categories_id' => $categories_id]) }} "
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="margin-left:20px">
                    Thêm danh mục con
                </a>
        </div>

                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-400" role="alert">
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Tên danh mục</th>
                            <th class="py-2 px-4 border-b">Slug</th>
                            <th class="py-2 px-4 border-b">Mô tả</th>
                            <th class="py-2 px-4 border-b">Danh mục cha</th>
                            <th class="py-2 px-4 border-b">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subCategories as $subCategory)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $subCategory->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $subCategory->slug }}</td>
                                <td class="py-2 px-4 border-b">{{ Str::limit($subCategory->description, 50) }}</td>
                                <td class="py-2 px-4 border-b">{{ $subCategory->category->name }}</td>

                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('admin.subcate.edit', ['id' => $subCategory->id]) }}" 
                                       class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 mr-2">Sửa</a>
                                
                                    <a href="{{ route('admin.subcate.show', ['id' => $subCategory->id]) }}" 
                                       class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 mr-2">Chi tiết</a>
                                
                                    <form action="{{ route('admin.subcate.destroy', ['id' => $subCategory->id]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600" style="color:black">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           
        </div>
    </div>
@endsection

<style>
.dash-content {
    padding: 20px;
    background-color: #f8f9fa;
}

.activity {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
}


h3.text-gray-400 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #6b7280;
    margin-bottom: 20px;
}


a.text-white.bg-gray-600 {
    background-color: #4b5563;
    color: #ffffff;
}

a.text-white.bg-gray-600:hover {
    background-color: #374151;
}

a.text-white.bg-blue-700 {
    background-color: #3b82f6;
    color: #ffffff;
}

a.text-white.bg-blue-700:hover {
    background-color: #2563eb;
}

a.text-white.bg-blue-700.focus:ring-blue-300 {
    --tw-ring-offset-shadow: var(--tw-ring-offset-shadow, 0 0 #0000);
    --tw-ring-shadow: var(--tw-ring-shadow, 0 0 #0000);
    --tw-ring-color: rgb(59 130 246);
    --tw-ring-offset-width: 2px;
    --tw-ring-offset-color: #ffffff;
    --tw-ring-opacity: 1;
    box-shadow: 0 0 0 calc(2px + 0px) rgb(59 130 246 / 1);
}

.p-4.mb-4.text-sm.text-green-800 {
    background-color: #d1fae5;
    color: #15803d;
    border-left: 4px solid #22c55e;
    padding: 1rem;
    border-radius: 0.375rem;
}

.p-4.mb-4.text-sm.text-green-800 span.font-medium {
    font-weight: 600;
}



table.min-w-full.bg-white {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table.min-w-full.bg-white thead th {
    background-color: #f3f4f6;
    color: #6b7280;
    padding: 12px 16px;
    text-align: left;
    border-bottom: 2px solid #e5e7eb;
}

table.min-w-full.bg-white tbody td {
    padding: 12px 16px;
    border-bottom: 1px solid #e5e7eb;
}

table.min-w-full.bg-white tbody tr:nth-child(even) {
    background-color: #f9fafb;
}

table.min-w-full.bg-white tbody tr:hover {
    background-color: #f3f4f6;
}

a.text-blue-600 {
    color: #2563eb;
}

a.text-blue-600:hover {
    text-decoration: underline;
}

form.inline button {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
}

form.inline button.text-red-600 {
    color: #dc2626;
}

form.inline button.text-red-600:hover {
    text-decoration: underline;
}
.bg-yellow-500 {
    background-color: #f59e0b;
}

.bg-yellow-600 {
    background-color: #d97706;
}

.bg-blue-500 {
    background-color: #3b82f6;
}

.bg-blue-600 {
    background-color: #2563eb;
}

.bg-red-500 {
    background-color: #ef4444;
}

.bg-red-600 {
    background-color: #dc2626;
}

.text-white {
    color: #ffffff;
}

.px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
}

.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

.rounded-lg {
    border-radius: 0.5rem;
}

.mr-2 {
    margin-right: 0.5rem;
}

.hover\:bg-yellow-600:hover {
    background-color: #d97706;
}

.hover\:bg-blue-600:hover {
    background-color: #2563eb;
}



</style>
