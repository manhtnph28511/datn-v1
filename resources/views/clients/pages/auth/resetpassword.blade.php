<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi mật khẩu</title>
    <link rel="icon" href="{{ asset('assets/imgs/clothes-hanger.png') }}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('assets/css/clients/home-client.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/clients/login.css') }}">
    <style>
        body {
            background-color: #a1a1a17c;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            /* line-height: inherit; */
        }
    </style>
</head>

<body>
    <div class="model">
        <div class="model_heading d-flex align-items-center">
            <span>Thay đổi mật khẩu</span>
        </div>
        @if ($status)
            <form action="{{ route('account.password.reset') }}" method="POST" id="login-form">
                @csrf
                <p>Mật khẩu</p>
                <input type="password" name="password" class="w-100 " value="{{ old('password') }}"
                    style="line-height: revert;">
                @error('password')
                    <style>
                        input[name="password"] {
                            border: 1px solid red;
                        }
                    </style>
                    <span class="text-danger my-2">{{ $message }}</span>
                @enderror
                <p>Nhập lại mật khẩu</p>
                <input type="password" name="password_confirm" class="w-100" value="{{ old('password_confirm') }}"
                    style="line-height: revert;">
                @error('password_confirm')
                    <style>
                        input[name="password_confirm"] {
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
                    <button class=" mt-2 normal text-white" style="margin:0">Thay đổi</button>
                </div>
            </form>
        @else
            <div class="alert alert-danger text-center">
                Liên kết không đúng hoặc đã hết hạn. Vui lòng thử lại.
            </div>
        @endif
    </div>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>

</html>