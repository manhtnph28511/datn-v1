@extends('clients.layouts.app')
@section('app')
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            {{-- <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at cara</span> --}}
            {{-- <button class="white">Learn More</button> --}}
        </div>
        <div class="banner-box banner-box2">
            {{-- <h4>spring/summer</h4>
            <h2>upcoming season</h2>
            <span>The best classic dress is on sale at cara</span> --}}
            {{-- <button class="white" style="margin: 20px">Collection</button> --}}
        </div>
    </section>
    <section id="banner3">
        <div class="banner-box">
            <h2 style="color:yellow ">SEASONAL SALE</h2>
            <h3 style="color:rgb(17, 62, 210)">Winter Collection -50% OFF</h3>
        </div>

        <div class="banner-box banner-box2">
            <h2 style="color:yellow ">NEW FOOTWEAR COLLECTION</h2>
            <h3>Spring/Summer 2022</h3>
        </div>

        <div class="banner-box banner-box3">
            <h2 style="color:yellow ">T-SHIRTS</h2>
            <h3 style="color:rgb(19, 195, 89)">New Trendy Prints</h3>
        </div>
    </section>

    <form action="{{ route('home-client.search.name') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Tên sản phẩm">
        <button type="submit">Tìm kiếm theo tên</button>
    </form>
    
    
    
    <section id="product1" class="section-p1">
        <h2 class="text-3xl">Featured Products</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
            @foreach ($products as $pro)
                    <div class="pro">
                        <a href="{{ route('home.site.product.show', ['id' => $pro->id, 'slug' => $pro->slug])."?cate=$pro->cate_id" }}">
                            <img src="{{ $pro->image }}" alt="">
                        </a>
                        <div class="des">
                            <span style="color: #ff8000">{{ optional($pro->statusProduct)->status ?? 'N/A' }}</span>
                            <h5>
                                <a href="{{ route('home.site.product.show', ['id' => $pro->id, 'slug' => $pro->slug])."?cate=$pro->cate_id" }}"
                                   class="text-decoration-none text-body-secondary">{{ $pro->name }}</a>
                            </h5>
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
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h4>{{ number_format($pro->price) }}</h4>
                                </div>
                            </div>
                            <p>Lượt xem: {{ $pro->view }}</p> 
                        </div>
                    </div>
            @endforeach
        </div>
    </section>
    
    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% Off</span> - All T-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>
  
    <section id="product1" class="section-p1">
        <h2 class="text-3xl">New Arrivals</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
            @foreach($products as $pro)
                @if($pro->status_id === 2)
                    <div class="pro">
                        <a href="{{ route('home.site.product.show', ['id' => $pro->id, 'slug' => $pro->slug])."?cate=$pro->cate_id" }}">
                            <img src="{{ $pro->image }}" alt="">
                        </a>
                        <div class="des">
                            <h5>
                                <a href="{{ route('home.site.product.show', ['id' => $pro->id, 'slug' => $pro->slug])."?cate=$pro->cate_id" }}"
                                   class="text-decoration-none text-body-secondary">{{ $pro->name }}</a>
                            </h5>

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

                            <h4>{{ number_format($pro->price) }}</h4>
                        </div>
                        <div>
                            {{ $pro->statusProduct->status }}
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    
    <section id="newletter" class="section-p1">
        <div class="newtext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get email updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            {{-- <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button> --}}
        </div>
    </section>
@endsection

<style>
    /* CSS cho form tìm kiếm */
form {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}


form input[type="number"] {
    width: calc(33.33% - 10px);
}

form button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #0056b3;
}
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