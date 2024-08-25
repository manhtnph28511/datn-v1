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
                <li><a href="">Danh sách yêu thích</a></li>
                <li><a href="{{ route('clients.users.vouchers') }}">Voucher của bạn</a></li>
                <li><a href="{{route('order.history')}}">lịch sử mua hàng</a></li>
                <li><a href="{{route('order.track')}}">theo dõi đơn hàng</a></li>
                <li><a href="{{ route('clients.notifications.index') }}" class="relative">
                    <span class="notification-count">Thông báo :{{ $unreadNotificationsCount }}</span>
                </a>
            </li>
                <li><a href="{{ route('account.logout') }}">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
@endsection
