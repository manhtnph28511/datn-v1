<section id="header">
    <a href="{{ route('home-client') }}" class="logo"><img src="{{ asset('assets/imgs/logo2.png') }}" alt=""></a>
    <div class="">
        <ul id="navbar">
            <li><a class="" href="{{ route('home-client') }}">Home</a></li>
            <li><a href="{{ route('home.site.product.shop')  }}">Shop</a></li>
            <li><a href="{{ route('clients.blogs.index') }}">Blog</a></li>
            <li><a href="{{ route('home.site.about')  }}">About</a></li>
            <li><a href="{{ route('home.site.contact')  }}">Contact</a></li>
            <li><a href="{{ route('clients.vouchers.index') }}">Xem Voucher</a>
            </li>
            @auth
            <li><a href="{{ route('clients.chats.index', ['userId' => auth()->user()->id]) }}">Chat với admin</a></li>
           @endauth

        </ul>
    </div>
    <div class="control">
        @if(Auth::check())
            @if(Auth::user()->role === 1)
                <div class="btn-group">
                    <p class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </p>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a></li>
                    </ul>
                </div>
            @else
                <div class="d-flex align-items-center ms-2 gap-x-3">
                    <a href="{{ route('clients.notifications.index') }}" class="notification-link">
                        <div class="icon-container">
                            <i class="fa-solid fa-bell"></i>
                            @if ($clientUnreadNotificationsCount > 0)
                                <span class="notification-count">{{ $clientUnreadNotificationsCount }}</span>
                            @endif
                        </div>
                        <span class="link-name" style="font-weight: bold;">Thông Báo</span>
                    </a>
                    
                    
                    
                    
                    <a href="{{ route('clients.index') }}">
                        <img src="{{ Auth::user()->avatar }}" alt="" class="object-contain w-[30px] rounded ">
                    </a>
                  
                    <a href="{{ route('home.cart') }}">
                        <img src="{{ asset('assets/imgs/shopping-bag.png') }}" alt="" class="object-contain w-[30px] rounded">
                    </a>
                </div>
            @endif
        @else
            <a href="{{ route('account.login') }}">Log In</a>
            <a href="{{ route('account.register') }}">Sign Up</a>
        @endif
    </div>

    <div class="mobile">
        <i class="user fa-solid fa-user"></i>
        <a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<style>
    /* Reset Margin and Padding for all elements */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Main Header Styling */
#header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#header .logo img {
    width: 120px; /* Adjust the size as needed */
}

#navbar {
    display: flex;
    list-style: none;
}

#navbar li {
    margin: 0 15px;
}

#navbar a {
    text-decoration: none;
    color: #333;
    font-weight: 500;
    transition: color 0.3s ease;
    font-family: Arial, sans-serif;
}

#navbar a:hover {
    color: #007bff; /* Highlight color on hover */
}

/* Control Section Styling */
.control {
    display: flex;
    align-items: center;
}

.btn-group {
    position: relative;
}

.dropdown-toggle {
    cursor: pointer;
    padding: 8px 12px;
    background-color: #007bff;
    color: #fff;
    border-radius: 4px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.dropdown-toggle:hover {
    background-color: #0056b3;
}

.dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.dropdown-menu .dropdown-item {
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s ease;
}

.dropdown-menu .dropdown-item:hover {
    background-color: #f8f9fa;
}

.btn-group:hover .dropdown-menu {
    display: block;
}

.notification-count {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: #ff0000;
    color: #fff;
    border-radius: 50%;
    padding: 3px 7px;
    font-size: 12px;
}

/* Mobile Header Styling */
.mobile {
    display: none;
}

@media (max-width: 768px) {
    #header {
        flex-direction: column;
        align-items: flex-start;
    }

    #navbar {
        display: none;
        flex-direction: column;
        width: 100%;
    }

    #navbar li {
        margin: 10px 0;
    }

    .mobile {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .mobile i {
        font-size: 24px;
        margin: 0 10px;
        cursor: pointer;
    }

    .mobile #bar {
        font-size: 30px;
    }
    
}

.notification-link {
    display: flex; 
    align-items: center; 
    text-decoration: none; 
    color: #333; 
}


.icon-container {
    position: relative; 
    margin-right: 8px; 
}


.icon-container .fa-bell {
    font-size: 20px; 
    color: #333; 
}


.icon-container .notification-count {
    position: absolute; 
    top: -5px; 
    right: -5px; 
    background-color: #ff0000; 
    color: #fff; 
    border-radius: 50%; 
    width: 20px; 
    height: 20px; 
    display: flex; 
    align-items: center;
    justify-content: center;
    font-size: 12px; 
}


.notification-link .link-name {
    font-size: 16px; 
    font-weight: normal; 
}
.link-name {
    font-size: 16px;
    font-weight: bold; 
    color: #333; 
    vertical-align: middle; 
    margin-left: 5px;
    font-family: Arial, sans-serif; 
    font-weight: bold;
}


</style>
