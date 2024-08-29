@extends('clients.layouts.app')
@section('app')
    {{-- Begin Banner   --}}
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcoming season</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Collection</button>
        </div>
    </section>
    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>

        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>Spring/Summer 2022</h3>
        </div>

        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New Trendy Prints</h3>
        </div>
    </section>

    {{-- Begin Search and Filter --}}
<!-- Form bộ lọc -->
<form action="{{ route('home.site.product.filter') }}" method="POST">
    @csrf
    <input type="text" name="query" placeholder="Tìm sản phẩm" value="{{ old('query') }}">
    <select name="category">
        <option value="">Chọn danh mục</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <input type="number" name="min_price" placeholder="Giá tối thiểu" value="{{ old('min_price') }}">
    <input type="number" name="max_price" placeholder="Giá tối đa" value="{{ old('max_price') }}">
    <button type="submit">Lọc</button>
</form>

{{-- End Search and Filter --}}

    {{-- End Banner   --}}
    {{-- Begin Product 1   --}}
    <section id="product1" class="section-p1">
        <h2 class="text-3xl">Featured Products</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
            @foreach ($products as $pro)
                @if($pro->status_id === 1)
                    <div class="pro">
                        <a href="{{ route('home.site.product.show', ['id' => $pro->id, 'slug' => $pro->slug])."?cate=$pro->cate_id" }}">
                            <img src="{{ $pro->image }}" alt="">
                        </a>
                        <div class="des">
                            <span>{{ $pro->subCate->name }}</span>
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
                                <div>
                                    {{ $pro->statusProduct->status }}
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    {{--  End Product 1  --}}
    {{-- Banner Top --}}
    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% Off</span> - All T-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>
    {{--  End Banner Top  --}}
    {{-- Begin Product 2   --}}
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
                            <span>{{ $pro->subCate->name }}</span>
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
    {{-- End Product 2   --}}
    <section id="newletter" class="section-p1">
        <div class="newtext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get email updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>
@endsection
