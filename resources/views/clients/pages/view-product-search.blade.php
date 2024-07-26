@extends('clients.layouts.app')
@section('app')

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>Save more with coupons&up to 70%off!</p>
    </section>

    <section id="cart-wrap">
        <div class="cart-list">
            <h4><i class="fa-sharp fa-solid fa-cart-shopping"></i> Giỏ hàng</h4>
            <div class="cart-item">
                <div class="product-list">
                    <div class="product-list-img"><img
                            src="{{ asset('assets/imgs/products/f1.jpg')  }}" alt=""></div>
                    <div class="product-info">
                        <h6>Cartoon Astronaut T-Shirts</h6>
                        <span>Số lượng:1</span>
                    </div>
                    <div class="product-price">
                        <span>$78</span>
                        <button class="normal">Xóa</button>
                    </div>
                </div>
                <button class="normal"> Xem giỏ hàng</button>
            </div>
        </div>
        @include('clients.layouts.form-search-product')
    </section>

    <section id="product1" class="section-p1 p-shop">
        <div class="p-category">
            <h4>Danh mục sản phẩm</h4>
            <ul class="category-list">
                <li><a href="#">Bán chạy nhất</a></li>
                <li><a href="#">Hàng mới về</a></li>
                <li><a href="#">Hàng giảm giá</a></li>
                <li>
                    @foreach($subCate as $sCate)
                        <ul class="nav_menu">
                            <li>
                                <a href="{{ route('home.site.product.proFromSubCate',$sCate->id)  }}">{{ $sCate->name  }}</a>
                            </li>
                        </ul>
                    @endforeach

                </li>
                <li>
                    Top 10 hàng yêu thích
                    <ul>
                        <li class="hot_pro">
                            <a href="#">
                                <div class="hot_pro--img"><img src="{{ asset('assets/imgs/products/f1.jpg')  }}" alt="">
                                </div>
                                <span>Áo sơ mi</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="pro-container">
            @forelse($productBySearch as $product)
                <div class="pro">
                    <a href="{{route('home.site.product.show',['id' => $product->id,'slug' => $product->slug])."?cate=$product->cate_id"}}">
                        <img src="{{ $product->image }}" alt="">
                    </a>
                    <div class="des">
                        <span>{{ $product->getSubCateName()->name  }}</span>
                        <h5>
                            <a href="{{route('home.site.product.show',['id' => $product->id,'slug' => $product->slug])}}"
                               class="text-decoration-none text-body-secondary">{{ $product->name }}</a></h5>

                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>{{ number_format($product->price)  }}</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            @empty
                <p>Không có kết quả mà bạn muốn tìm</p>
            @endforelse
        </div>
    </section>
    <div class="mb-3">
        {{--        {{ $products->links('admin.layouts.pagination')  }}--}}
    </div>
    @include('clients.layouts.form-feedback')
@endsection
