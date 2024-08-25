<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="icon" href="{{ asset('assets/imgs/clothes-hanger.png') }}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('assets/css/clients/home-client.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/clients/login.css') }}">
    <style>
        body {
            background-color: #a1a1a17c;
        }
    </style>
</head>

<body>
    <div class="model">
        <div class="model_heading d-flex align-items-center">
            <span>Quên mật khẩu</span>
            <span><a href="{{ route('account.login') }}" class="text-decoration-none">Đăng nhập</a></span>
        </div>
        <form action="{{ route('account.forgotpassword') }}" method="POST" id="login-form">
            @csrf
            <p>Email</p>
            <input type="text" name="email" class="w-100" value="{{ old('email') }}">
            @error('email')
                <style>
                    input[name="email"] {
                        border: 1px solid red;
                    }
                </style>
                <span class="text-danger my-2">{{ $message }}</span>
            @enderror
            @if (session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger mt-2">
                    {{ session('error') }}
                </div>
            @endif

            <div class="d-flex mt-2  justify-content-end">
                <button class=" mt-2 normal text-white" style="margin:0">Xác thực</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>

</html>