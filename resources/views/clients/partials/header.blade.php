<section id="header" class="bg-white shadow-md py-4 fixed w-full top-0 z-50">
    <div class="container mx-auto flex items-center justify-between px-4">
        <a href="{{ route('home-client') }}" class="logo text-2xl font-bold text-gray-800 transition-transform duration-300 transform hover:scale-110">
            MWSPORT
        </a>
        <div class="hidden md:flex items-center space-x-8">
            <ul id="navbar" class="flex space-x-6 text-gray-700 font-semibold">
                <li><a class="hover:text-blue-500 transition-colors" href="{{ route('home-client') }}">Home</a></li>
                <li><a class="hover:text-blue-500 transition-colors" href="{{ route('home.site.product.shop') }}">Shop</a></li>
                <li><a class="hover:text-blue-500 transition-colors" href="{{ route('home.site.blog') }}">Blog</a></li>
                <li><a class="hover:text-blue-500 transition-colors" href="{{ route('home.site.about') }}">About</a></li>
                <li><a class="hover:text-blue-500 transition-colors" href="{{ route('home.site.contact') }}">Contact</a></li>
            </ul>
        </div>
        <div class="control flex items-center space-x-4">
            @if(Auth::check())
                @if(Auth::user()->role === 1)
                    <div class="relative">
                        <button class="flex items-center space-x-2 focus:outline-none" id="dropdownUserButton">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden">
                            <a class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-200 transition-colors" href="{{ route('admin') }}">Dashboard</a>
                            <a class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-200 transition-colors" href="{{ route('account.logout') }}">Logout</a>
                        </div>
                    </div>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('clients.index') }}">
                            <img src="{{ Auth::user()->avatar }}" alt="" class="object-contain w-8 h-8 rounded-full transition-transform duration-300 transform hover:scale-110">
                        </a>
                        <a href="{{ route('home.cart') }}">
                            <img src="{{ asset('assets/imgs/shopping-bag.png') }}" alt="" class="object-contain w-8 h-8 transition-transform duration-300 transform hover:scale-110">
                        </a>
                    </div>
                @endif
            @else
                <a href="{{ route('account.login') }}" class="text-blue-500 hover:underline transition-colors">Log In</a>
                <a href="{{ route('account.register') }}" class="ml-4 text-blue-500 hover:underline transition-colors">Sign Up</a>
            @endif
        </div>

        <div class="mobile md:hidden flex items-center space-x-4">
            <i class="user fa-solid fa-user text-xl cursor-pointer"></i>
            <a href="{{ route('home.cart') }}"><i class="fa-solid fa-bag-shopping text-xl"></i></a>
            <i id="bar" class="fas fa-bars text-xl cursor-pointer"></i>
        </div>
    </div>
</section>
