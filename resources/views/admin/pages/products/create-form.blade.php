@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <h3 class="text-gray-400 mb-4">Thêm mới sản phẩm</h3>
                <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-x-6">
                        <div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="name" id=""
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " value="{{ old('name') }}" />
                                <label for=""
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Tên sản phẩm</label>
                                @error('name')
                                    <p class="my-2 text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Thêm ảnh</label>
                                <input onchange="changeImg()"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="img" type="file" name="image">
                                @error('image')
                                    <p class="my-2 text-red-400">{{ $message }}</p>
                                @enderror
                                <div class="my-3 flex justify-center">
                                    <img src="" alt="" id="imgPreview" width="200px">
                                </div>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="price" id=""
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " name="price" />
                                <label for=""
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Giá</label>
                                @error('price')
                                    <p class="my-2 text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="quantity" id=""
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " name="quantity" />
                                <label for=""
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Số
                                    lượng</label>
                                @error('quantity')
                                    <p class="my-2 text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Loại sản
                                    phẩm</label>
                                <select name="status_id" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($sttProduct as $stt)
                                        <option value="{{ $stt->id }}">{{ $stt->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Chọn danh
                                    mục</label>
                                <select name="cate_id" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($cates as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                                @error('cate_id')
                                    <p class="my-2 text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thương hiệu</label>
                                <select name="brand_id" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                    @error('brand_id')
                                        <p class="my-2 text-red-400">{{ $message }}</p>
                                    @enderror
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chọn kích
                                    thước</label>
                                <select name="size_id" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                                @error('size_id')
                                    <p class="my-2 text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chọn màu</label>
                                <div class="flex gap-x-2">
                                    <select name="color_id" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              
                                <div>
                                    @error('color_id')
                                        <p class="my-2 text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mô
                            tả</label>
                        <textarea id="desc" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here..." name="description"></textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Thêm mới
                    </button>
                    <a href="{{ route('admin.product.index') }}"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Hủy
                        bỏ</a>
                </form>
            </div>
        </div>
    </div>
@endsection

<style>
    /* General form styles */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

form .relative {
    position: relative;
}

form .peer-focus\:font-medium {
    font-weight: 500;
}

form .peer-placeholder-shown\:scale-100 {
    transform: scale(1);
}

form .peer-focus\:scale-75 {
    transform: scale(0.75);
}

form .peer-focus\:text-blue-600 {
    color: #1D4ED8;
}

form .peer-focus\:dark\:text-blue-500 {
    color: #3B82F6;
}

form .peer-focus\:dark\:text-gray-400 {
    color: #D1D5DB;
}

form .dark\:bg-gray-700 {
    background-color: #374151;
}

form .dark\:border-gray-600 {
    border-color: #4B5563;
}

form .dark\:placeholder-gray-400 {
    color: #9CA3AF;
}

form .text-gray-900 {
    color: #111827;
}

form .bg-gray-50 {
    background-color: #F9FAFB;
}

form .border-gray-300 {
    border-color: #D1D5DB;
}

form .rounded-lg {
    border-radius: 0.5rem;
}

form .focus\:ring-blue-500 {
    box-shadow: 0 0 0 2px rgba(29, 78, 216, 0.5);
}

form .focus\:border-blue-500 {
    border-color: #1D4ED8;
}

/* Select styles */
select {
    background-color: #F9FAFB;
    border-color: #D1D5DB;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    appearance: none;
}

select:focus {
    border-color: #1D4ED8;
    outline: none;
    box-shadow: 0 0 0 2px rgba(29, 78, 216, 0.5);
}

/* Image preview styles */
#imgPreview {
    border-radius: 0.5rem;
    border: 1px solid #D1D5DB;
    object-fit: cover;
}

/* Buttons */
button {
    background-color: #1D4ED8;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    cursor: pointer;
}

button:hover {
    background-color: #2563EB;
}

button:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(29, 78, 216, 0.5);
}

/* Cancel button */
a {
    
    color: #fff;
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
}


a:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(220, 38, 38, 0.5);
}

/* Error message styles */
p.text-red-400 {
    color: #F87171;
    font-size: 0.875rem;
}

</style>
@push('script')
    <script>
        // get input value color
        function chooseColor(color) {
            console.log(document.querySelector(`input[name="color_id"]`).value = color);
        }

        //change image
        function changeImg() {
            const img = document.querySelector('#img').files[0];
            const imgPreview = document.querySelector('#imgPreview');
            const reader = new FileReader();
            reader.addEventListener('load', () => {
                imgPreview.src = reader.result;
            });
            if (img) {
                reader.readAsDataURL(img);
            }
        }

        // ck editor
        ClassicEditor
            .create(document.querySelector('#desc'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

