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
        @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hiển thị lỗi nếu có -->
    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('account.password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ old('user_id', $user_id) }}">

        <div>
            <label for="password">Mật khẩu mới:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">Xác nhận mật khẩu:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div>
            <button type="submit">Cập Nhật Mật Khẩu</button>
        </div>
    </form>
    </div>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>

</html>

<style>

body {
    background-color: #f4f4f4;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}


.model {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


.model h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}


.model div[style*="color: green;"],
.model div[style*="color: red;"] {
    margin-bottom: 20px;
    padding: 10px;
    border-radius: 4px;
    text-align: center;
}

.model div[style*="color: green;"] {
    background-color: #e0f7e0;
    color: #2e7d32;
}

.model div[style*="color: red;"] {
    background-color: #fddede;
    color: #d32f2f;
}


.model input[type="password"] {
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

</style>