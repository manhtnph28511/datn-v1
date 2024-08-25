
@extends('clients.layouts.app')

@section('app')
<section id="prodetails" class="section-p1">
    
    <div class="single-pro-image">
        <img src="{{ $product->image }}" width="100%" id="mainImg" alt="">
    </div>
    <div class="single-pro-detail">
        <form action="{{ route('home.cart.addToCart') }}" method="POST" id="product-form">
            @csrf

            @if ($errors->any())
            <div id="error-message" style="color: red;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <!-- Hiển thị thông báo thành công nếu có -->
            @if (session('success'))
                <div id="success-message" style="color: green;">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" style="color: red;">
                    {{ session('error') }}
                </div>
            @endif


            <h6><a href="{{ route('home-client') }}" class="text-gray-700">Home</a> / {{ $product->subCate->name }}</h6>
            <h4>{{ $product->name }}</h4>
            <input type="hidden" value="{{ $product->id }}" name="pro_id">

            <!-- Hiển thị giá cơ bản -->
            <p id="product-price">Giá: {{ number_format($product->price, 2, '.', ',') }}</p>


            <!-- Hiển thị thông báo lỗi nếu có -->
            

            <select name="size_id" id="size-select" class="border">
                <option value="">Chọn kích thước</option>
                @foreach($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select>

            <select name="color_id" id="color-select" class="border">
                <option value="">Chọn màu sắc</option>
                @foreach($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                @endforeach
            </select>
            <input type="number" value="1" min="1" class="border" name="quantity">
            <button class="normal">Thêm vào giỏ hàng</button>
        </form>
        <h4>Chi tiết sản phẩm</h4>
        <span>{!! $product->description !!}</span>


        <div class="container">
            {{-- <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <p>Giá: {{ number_format($product->price, 0, ',', '.') }} VND</p> --}}
        
            <h2>Đánh giá</h2>
        
            @forelse($product->ratings as $rating) 
                <div>
                    <strong>{{ $rating->user->name ?? 'Người dùng không xác định' }}:</strong> 
                    <p>Đánh giá: {{ $rating->rating }} Sao</p>
                     <p>{{ $rating->review }}</p>
                    <p>Ngày: {{ $rating->created_at->format('d-m-Y H:i:s') }}</p>
                </div>
                <hr>
           @empty
                <p>Chưa có đánh giá nào cho sản phẩm này.</p>
            @endforelse 
        
            @auth
                <form action="{{ route('home.rating.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label for="rating">Đánh giá:</label>
                        <select id="rating" name="rating" class="form-control">
                            <option value="">Chọn đánh giá</option>
                            <option value="1">1 Sao</option>
                            <option value="2">2 Sao</option>
                            <option value="3">3 Sao</option>
                            <option value="4">4 Sao</option>
                            <option value="5">5 Sao</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="review">Bình luận:</label>
                        <textarea id="review" name="review" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                </form>
            @else
                <p>Đăng nhập để gửi đánh giá.</p>
            @endauth
        </div>
    </div>

    
</section>



<script>
    document.addEventListener('DOMContentLoaded', function() {
    const sizeSelect = document.getElementById('size-select');
    const colorSelect = document.getElementById('color-select');
    const priceElement = document.getElementById('product-price');
    let basePrice = {{ $product->price }};
    let variants = @json($product->product_variants);

    function updatePrice() {
        let selectedSizeId = sizeSelect.value;
        let selectedColorId = colorSelect.value;

        if (!selectedSizeId || !selectedColorId) {
            priceElement.textContent = 'Giá: ' + basePrice;
            return;
        }

        let matchingVariant = variants.find(variant => 
            variant.size_id == selectedSizeId && variant.color_id == selectedColorId
        );

        if (matchingVariant) {
            priceElement.textContent = 'Giá: ' + matchingVariant.price;
        } else {
            priceElement.textContent = 'Giá: ' + basePrice;
            
        }
    }

    sizeSelect.addEventListener('change', updatePrice);
    colorSelect.addEventListener('change', updatePrice);
});

</script>
@endsection
    
    