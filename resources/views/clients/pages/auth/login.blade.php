<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        <span>Đăng nhập</span>
        <span><a href="{{ route('account.register') }}" class="text-decoration-none">Đăng ký</a></span>
    </div>
    <form action="{{ route('account.login') }}" method="POST" id="login-form">
        @csrf
        <p>Email đăng nhập</p>
        <input type="text" name="email" value="{{ old('email') }}">
        @error('email')
        <style>
            input[name="email"] {
                border: 1px solid red;
            }
        </style>
        <span class="text-danger my-2">{{ $message }}</span>
        @enderror
        {{--            <span class="text-danger error email-error"></span>--}}
        <p>Mật khẩu</p>
        <input type="password" name="password" value="{{ old('password')  }}">
        @error('password')
        <style>
            input[name="password"] {
                border: 1px solid red;
            }
        </style>
        <span class="text-danger my-2">{{ $message }}</span>
        @enderror
        <button class="normal" style="float:right">Đăng nhập</button>
    </form>
    <div class="d-flex flex-col">
        <button class="qmk"><a href="{{ route('account.password.request') }}">Quên mật khẩu?</a></button>
    </div>
</div>
@include('sweetalert::alert')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
{{--    <script src="{{ asset('assets/js/clients/login-form.js')  }}"></script>--}}
</body>
</html>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #a1a1a17c;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.model {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

.model_heading {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.model_heading a {
    color: #007bff;
    text-decoration: none;
}

.model_heading a:hover {
    text-decoration: underline;
}

form p {
    margin-bottom: 8px;
    font-weight: bold;
}

form input[type="text"],
form input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
    font-size: 16px;
}

form input[type="text"]:focus,
form input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
}

form .text-danger {
    color: red;
    font-size: 14px;
}

button.normal {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    text-align:center;
    margin-top: 10px;
    margin: 0 0 0
}

button.normal:hover {
    background-color: #0056b3;
}

.d-flex.flex-col {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
}

.d-flex.flex-col a {
    margin-top: 10px; 
    color: #007bff;
    text-decoration: none;
}

.d-flex.flex-col a:hover {
    text-decoration: underline;
}
.qmk{
    width: 100px;
    float: left;
    margin: 0 -100px 0 0 ;
    border-radius: 5px;
}
a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.sweetalert2-popup {
    font-size: 1.2rem;
    font-family: Arial, sans-serif;
}

</style>
