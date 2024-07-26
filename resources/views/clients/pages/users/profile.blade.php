@extends('clients.layouts.app')
@section('title')
    Profile Page
@endsection
@section('app')
    <div class="container">
        <div class="main-body">
            <form action="{{ route('clients.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <div class="row">
                    <div class="col-lg-4 my-20">
                        <div class="card h-[350px]">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ Auth::user()->avatar }}" alt="Admin" class="rounded-circle p-1"
                                        width="110" id="avatarPreview">
                                    <div class="mt-3">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <label class="block">
                                            <span class="sr-only">Ảnh đại diện</span>
                                            <input type="file"
                                                class="mx-auto block w-[300px] text-sm text-gray-500 my-3
                                                file:mr-4 file:py-2 file:px-4
                                                file:rounded-md file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-blue-500 file:text-white
                                                hover:file:bg-blue-600
                                                hover:cursor-pointer
                                            "
                                                name="avatar" id="avatar" onchange="changeImg()" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 my-20">
                        <div class="card h-[350px]">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Họ và tên</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                            name="name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                            name="email" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Số điện thoại</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ Auth::user()->phone }}"
                                            name="phone">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Địa chỉ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ Auth::user()->address }}"
                                            name="address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                            Cập nhật
                                        </button>
                                        <a href="{{ route('account.logout') }}"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Đăng
                                            xuất</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script>
        //change image
        function changeImg() {
            const avatar = document.querySelector('#avatar').files[0];
            const avatarPreview = document.querySelector('#avatarPreview');
            const reader = new FileReader();
            reader.addEventListener('load', () => {
                avatarPreview.src = reader.result;
            });
            if (avatar) {
                reader.readAsDataURL(avatar);
            }
        }
    </script>
@endpush
