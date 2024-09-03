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
        <form action="{{ route('account.password.forgot') }}" method="POST">
            @csrf
            <div>
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <button type="submit">Gửi yêu cầu</button>
            </div>
        </form>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>

</html>

<style>
    
body {
    background-color: #e0e0e0; 
    font-family: Arial, sans-serif; 
    margin: 0;
    padding: 0;
}


.model {
    max-width: 500px; 
    margin: 50px auto; 
    padding: 20px;
    background-color: #fff; 
    border-radius: 8px; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
}


.model_heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.model_heading span {
    font-size: 18px;
    color: #333;
}

.model_heading a {
    color: #007bff; 
    text-decoration: none;
}

.model_heading a:hover {
    text-decoration: underline; 
}


.model input[type="text"],
.model input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 15px;
    box-sizing: border-box;
}


.model label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}


.model button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.model button:hover {
    background-color: #0056b3; 
}


.model div {
    margin-bottom: 20px;
    padding: 10px;
    border-radius: 4px;
    background-color: #fddede;
    color: #d32f2f;
}

.model div p {
    margin: 0;
}

</style>