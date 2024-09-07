@extends('clients.layouts.app')

@section('title') Chi tiết sản phẩm @endsection

@section('app')

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>Save more with coupons&up to 70%off!</p>
    </section>

    <section id="cart-wrap">
        <div class="cart-list">
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
                @endif
            </div>
        </div>
        <div class="form" style="margin:0px 0 0 -70px">
            @livewire('home-search-product')
        </div>
    </section>

    <section id="product1" class="section-p1 p-shop">
        <div class="p-category">
            <h4>Danh mục sản phẩm</h4>
            <ul class="category-list">
                <li>
                    @foreach($subCate as $sCate)
                        @if($sCate->parent_id === 1)
                            <ul class="nav_menu">
                                <li>
                                    <a href="{{ route('home.site.product.proFromSubCate',$sCate->id)  }}">{{ $sCate->name  }}</a>
                                </li>
                            </ul>
                        @endif
                    @endforeach

                </li>
            </ul>
        </div>
        <div class="pro-container">
            @if(count($proFromSubCate) > 0)
            @foreach($proFromSubCate as $prToSubCate)
            <div class="pro">
                <a href="{{ route('home.site.product.show', ['id' => $prToSubCate->id, 'slug' => $prToSubCate->slug]) }}">
                    <img src="{{ $prToSubCate->image }}" alt="{{ $prToSubCate->name }}">
                </a>
                <div class="des">
                    <span>{{ $prToSubCate->subCategory->name }}</span>
                    <h5>
                        <a href="{{ route('home.site.product.show', ['id' => $prToSubCate->id, 'slug' => $prToSubCate->slug]) }}"
                           class="text-decoration-none text-body-secondary">{{ $prToSubCate->name }}</a>
                    </h5>

                    <div class="star">
                        @if ($prToSubCate->ratings->isNotEmpty())
                            @php
                                $averageRating = $prToSubCate->ratings->avg('rating');
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

                    
                    <h4>{{ number_format($prToSubCate->price) }}</h4>
                </div>
            </div>
        @endforeach
        
            @else
                <p class="alert alert-warning">Không có sản phẩm cùng danh mục</p>
            @endif
        </div>
    </section>
    <div class="mb-3">
    </div>
    @include('clients.layouts.form-feedback')
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
    height: 200px; 
    object-fit: cover; 
    display: block; 
}

.pro .star {
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
</style>