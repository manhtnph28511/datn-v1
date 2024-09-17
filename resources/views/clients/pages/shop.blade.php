@extends('clients.layouts.app')
@section('title') Sản phẩm @endsection

@section('app')

    <section id="page-header">
        <h2>Sản phẩm</h2>
        <p>Cùng mua sắm nào!</p>
    </section>

    <section id="cart-wrap">
        <div class="cart-list" style="margin:12px">
            <h4><i class="fa-sharp fa-solid fa-cart-shopping"></i> Giỏ hàng</h4>
            <div class="cart-item">
                @if($carts->count() > 0)
                    @foreach($carts as $item)
                        <div class="product-list">
                            <div class="product-list-img">
                                <img src="{{ $item->image }}" alt=""></div>
                            <div class="product-info">
                                <h6>{{ $item->proName  }}</h6>
                                <span>Số lượng: {{ $item->quantity  }}</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('home.cart')  }}"
                               class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900
                       focus:outline-none bg-white rounded-full border border-gray-200
                       hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200
                       dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600
                       dark:hover:text-white dark:hover:bg-gray-700">
                                Xem giỏ hàng</a>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-sm text-gray-400">Giỏ hàng của bạn đang trống</p>
                    <a href="{{ route('home-client') }}"
                       class="w-[200px] text-center block text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 my-2 mx-auto">Mua
                        sắm nào</a>
            </div>
            @endif
        </div>
        <form action="{{ route('home.site.product.searchByPrice') }}" method="POST" class="search-form">
            @csrf
            <div class="form-group">
                <input type="number" name="min_price" placeholder="Giá tối thiểu" required class="form-input">
            </div>
            <div class="form-group">
                <input type="number" name="max_price" placeholder="Giá tối đa" required class="form-input">
            </div>
            <button type="submit" class="form-button">Tìm kiếm theo giá</button>
        </form>
        <div class="form" style="margin:20px 0 0 -150px">
        @livewire('home-search-product')
    </div>
        
        
    </section>

    <section id="product1" class="section-p1 p-shop">
        <div class="p-category">
            <h4>Danh mục sản phẩm</h4>
            <ul class="category-list">
                <li>
                    <ul class="nav_menu">
                        @foreach($cates as $cate)
                            <li><a href="{{ route('home.site.cate.detail', $cate->id) }}">{{ $cate->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <h2>Top 10 sản phẩm có lượt xem nhiều nhất</h2>
                    <ul>
                        @foreach($topProducts as $product)
                        <li class="hot_pro">
                            <a href="{{ route('home.site.product.show', ['id' => $product->id]) }}" class="product-link">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                                <div class="product-info">
                                    <p class="product-name">{{ $product->name }}</p>
                                    <span class="product-view">Lượt xem: {{ $product->view }}</span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="pro-container">
            @foreach($products as $pro)
                <div class="pro" style="height:410px">
                    <a href="{{route('home.site.product.show',['id' => $pro->id,'slug' => $pro->slug])."?cate=$pro->cate_id"}}">
                        <img src="{{ $pro->image }}" alt="" style="height=80px" >
                    </a>
                    <div class="des">
                        <span>
                            @if($pro->subCate)
                                {{ $pro->subCate->name }}
                            @else
                                Danh mục không có
                            @endif
                        </span>
                        
                        <a href="{{route('home.site.product.show',['id' => $pro->id,'slug' => $pro->slug])}}">
                            <h5>{{ $pro->name  }}</h5>
                        </a>
                        <h4>{{ number_format($pro->price)  }}</h4>
                        <div class="star">
                                @if ($pro->ratings->isNotEmpty())
                                    @php
                                        $averageRating = $pro->ratings->avg('rating');
                                        $roundedRating = round($averageRating, 1);
                                    @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $roundedRating ? 'filled' : '' }}"></i>
                                    @endfor
                                    <span>{{ number_format($roundedRating, 1) }} Sao</span>
                                @else
                                    <p>Chưa có đánh giá nào</p>
                                @endif
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <div class="flex justify-center mb-6">
        {{ $products->links('admin.layouts.pagination')  }}
        {{-- {{ $products->appends(request()->query())->links() }} --}}
    </div>
    {{-- @include('clients.layouts.form-feedback') --}}
@endsection


<style>
    .pro-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; 
    justify-content: space-between;
}

.pro {
    border: 1px solid #ddd; 
    padding: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    background-color: #fff; 
    border-radius: 8px; 
    overflow: hidden; 
    height: 360px; 
    width: 100%; 
    max-width: 200px; 
}

.pro img {
    width: 100%; 
    height: 250px; 
    object-fit: cover; 
    display: block; 
}

.pro .des {
    margin-top: 10px; 
}

.pro .star {
    margin-top: 5px;
    color: #FFD700; 
}

.pro .star .fa-star {
    font-size: 14px; 
    margin-right: 2px; 
}

.pro .des h5 {
    font-size: 16px;
    color: #333; 
    margin: 0;
}

.pro .des h4 {
    font-size: 18px;
    color: #333; 
    margin: 5px 0 0; 
}

.top-products-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.top-products-list .hot_pro {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
}

.product-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: inherit;
}

.product-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
}

.product-info {
    display: flex;
    flex-direction: column;
    margin-left: 10px;
}

.product-name {
    font-size: 14px;
    font-weight: bold;
    margin: 0;
}

.product-view {
    font-size: 12px;
    color: #555;
}


.search-form {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 800px;
    margin: 0 0 0 100px;
    padding: 10px;
    border-radius: 8px;
    background-color: #f9f9f9;
    float:left;
}

.form-group {
    margin-right: 10px;
    flex: 1;
}

.form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

.form-input:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 0 2px rgba(38, 143, 255, 0.2);
}

.form-button {
    padding: 10px 20px;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-button:hover {
    background-color: #0056b3;
}

.form-button:active {
    background-color: #004080;
}

</style>
