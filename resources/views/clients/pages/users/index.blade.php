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
                <li><a href="{{ route('clients.users.wishlists') }}">Xem Wishlist</a></li>
                <li><a href="{{ route('clients.ratings.index') }}">Xem đánh giá của bạn</a></li>
                <li><a href="{{ route('clients.notifications.index') }}" class="relative">
                    <span class="notification-count">Thông báo :{{ $unreadNotificationsCount }}</span>
                </a>
            </li>
                <li><a href="{{ route('account.logout') }}">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
@endsection

<style>

.profile-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.profile-header {
    text-align: center;
    margin-bottom: 20px;
}

.profile-header h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.profile-header p {
    font-size: 18px;
    color: #666;
}

.profile-links {
    margin-top: 20px;
}

.profile-links ul {
    list-style-type: none;
    padding: 0;
}

.profile-links ul li {
    margin-bottom: 10px;
}

.profile-links ul li a {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #007BFF;
    font-size: 16px;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

.profile-links ul li a:hover {
    background-color: #007BFF;
    color: #ffffff;
}

.notification-count {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: #ff0000;
    color: #ffffff;
    padding: 2px 8px;
    border-radius: 50%;
    font-size: 12px;
    font-weight: bold;
}

</style>
