@extends('admin.layouts.app')

@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="flex justify-end my-2">
                    <a href="{{ route('admin.status.index') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded-full">Quay lại</a>
                </div>

                <h3 class="text-xl font-semibold mb-4">Thêm mới trạng thái</h3>

                {{-- Form thêm mới trạng thái --}}
                <form action="{{ route('admin.status.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Trạng thái:</label>
                        <input type="text" id="status" name="status" value="{{ old('status') }}" class="border border-gray-300 p-2 rounded-md w-full">
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Mô tả:</label>
                        <textarea id="description" name="description" class="border border-gray-300 p-2 rounded-md w-full">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md">
                        Thêm mới
                    </button>
                </form>
                
            </div>
        </div>
    </div>
@endsection
