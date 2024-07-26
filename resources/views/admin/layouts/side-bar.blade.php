<nav>
    <div class="logo-name">
        <a href="{{ route('home-client') }}">
            <span class="logo_name">MWSPORT</span>
        </a>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="{{ route('admin') }}">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
            <li><a href="{{ route('admin.product.index') }}">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Sản Phẩm</span>
                </a></li>
            <li><a href="{{ route('admin.brand.index') }}">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Thương Hiệu</span>
                </a></li>
            <li><a href="{{ route('admin.category.index') }}">
                    <i class="fa-solid fa-coins"></i>
                    <span class="link-name">Danh Mục</span>
                </a></li>
            <li><a href="{{ route('admin.att.index') }}">
                    <i class="fa-solid fa-industry"></i>
                    <span class="link-name">Thuộc Tính</span>
                </a></li>
            <li><a href="{{ route('admin.customer.index') }}">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="link-name">Người Dùng</span>
                </a></li>
            {{-- <li><a href="{{ route('admin.order.index') }}">
                    <i class="fa-solid fa-thumbtack"></i>
                    <span class="link-name">Quản Lý Đơn Hàng</span>
                </a></li> --}}
        </ul>

        <ul class="logout-mode">
            <li><a href="{{ route('account.logout') }}">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Đăng Xuất</span>
                </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>
</nav>
