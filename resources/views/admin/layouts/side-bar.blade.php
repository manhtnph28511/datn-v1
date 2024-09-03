<nav>
    <div class="logo-name">
        <a href="{{ route('home-client') }}">
            <span class="logo_name">MWSPORT</span>
        </a>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-tachometer-alt"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
            <li><a href="{{ route('admin.product.index') }}">
                    <i class="fa-solid fa-box"></i>
                    <span class="link-name">Sản Phẩm</span>
                </a></li>
            <li><a href="{{ route('admin.brand.index') }}">
                    <i class="fa-solid fa-tags"></i>
                    <span class="link-name">Thương Hiệu</span>
                </a></li>
            <li><a href="{{ route('admin.category.index') }}">
                    <i class="fa-solid fa-th-list"></i>
                    <span class="link-name">Danh Mục</span>
                </a></li>
            <li><a href="{{ route('admin.att.index') }}">
                    <i class="fa-solid fa-cogs"></i>
                    <span class="link-name">Thuộc Tính</span>
                </a></li>
            <li><a href="{{ route('admin.status.index') }}">
                <i class="fa-solid fa-table"></i>
                <span class="link-name">Loại sản phẩm</span>
            </a></li>
            <li><a href="{{ route('admin.blogs.index') }}">
                <i class="fa-solid fa-blog"></i>
                <span class="link-name">Bài viết</span>
            </a></li>            
            <li><a href="{{ route('admin.manage.index') }}">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="link-name">Tài Khoản Admin</span>
                </a></li>
            <li><a href="{{ route('admin.customer.index') }}">
                    <i class="fa-solid fa-user"></i>
                    <span class="link-name">Tài Khoản User</span>
                </a></li>
            <li><a href="{{ route('admin.order.index') }}">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span class="link-name">Trạng thái Đơn Hàng</span>
                </a></li>
            <li><a href="{{ route('admin.orderdetail.index') }}">
                <i class="fa-solid fa-list-alt"></i>
                <span class="link-name">Quản lí đơn hàng</span>
            </a></li>
            <li><a href="{{ route('admin.vouchers.index') }}">
                <i class="fa-solid fa-ticket-alt"></i>
                <span class="link-name">Voucher</span>
            </a></li>
            <li><a href="{{ route('admin.ratings.index') }}">
                <i class="fa-solid fa-comments"></i>
                <span class="link-name">Quản lí comment</span>
            </a></li>
            <li><a href="{{ route('admin.chats.index') }}">
                <i class="fa-solid fa-comments"></i>
                <span class="link-name">Chat</span>
            </a></li>
            <li><a href="{{ route('admin.notifications.index') }}">
                <i class="fa-solid fa-bell"></i>
                <span class="link-name">Thông Báo</span>
                <span class="notification-count">{{ $unreadNotificationsCount }}</span>
            </a></li>
        </ul>
        
        <ul class="logout-mode">
            <li><a href="{{ route('account.logout') }}">
                    <i class="fa-solid fa-sign-out-alt"></i>
                    <span class="link-name">Đăng Xuất</span>
                </a></li>

            <li class="mode">
                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>
</nav>

<style>
    .notification-count {
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 4px 8px;
    font-size: 14px;
    margin-left: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px; /* Đảm bảo có đủ không gian để hiển thị */
    height: 24px; /* Đảm bảo có đủ không gian để hiển thị */
    text-align: center; /* Canh giữa nội dung */
}
.menu-items {
    height: 100vh; /* Chiều cao bằng chiều cao của viewport */
    overflow-y: auto; /* Để cuộn khi nội dung vượt quá chiều cao */
}
</style>
