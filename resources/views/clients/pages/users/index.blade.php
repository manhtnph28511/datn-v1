@extends('clients.layouts.app')

@section('app')
    <div class="profile-container">
        <div class="profile-header">
            <h1>Thông tin cá nhân</h1>
            <p>Chào {{ Auth::user()->name }}</p>
        </div>
        <div class="profile-links">
            <ul>
                <li><a href="{{route('clients.profile')}}">Cập nhật tài khoản</a></li>
                <li><a href="">Quên mật khẩu</a></li>
                <li><a href="">Danh sách yêu thích</a></li>
                <li><a href="">lịch sử mua hàng</a></li>
                <li><a href="">giỏ hàng</a></li>
                <li><a href="{{ route('account.logout') }}">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
@endsection
