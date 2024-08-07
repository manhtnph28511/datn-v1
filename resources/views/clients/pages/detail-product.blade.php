@extends('clients.layouts.app')

@section('app')
<section id="prodetails" class="section-p1">
    <div class="single-pro-image">
        <img src="{{ $product->image }}" width="100%" id="mainImg" alt="">
    </div>
    <div class="single-pro-detail">
        <form action="{{ route('home.cart.addToCart') }}" method="POST" id="product-form">
            @csrf
            <h6><a href="{{ route('home-client') }}" class="text-gray-700">Home</a> / {{ $product->subCate->name }}</h6>
            <h4>{{ $product->name }}</h4>
            <input type="hidden" value="{{ $product->id }}" name="pro_id">

            <!-- Hiển thị giá cơ bản -->
            <p id="product-price">Giá: {{ number_format($product->price) }}</p>

            <!-- Hiển thị thông báo lỗi nếu có -->
            @if ($variantError)
                <div id="error-message" style="color: red;">
                    {{ $variantError }}
                </div>
            @else
                <div id="error-message" style="color: red; display: none;"></div>
            @endif

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
    </div>
</section>


{{-- <script>
document.addEventListener('DOMContentLoaded', function() {
    const sizeSelect = document.getElementById('size-select');
    const colorSelect = document.getElementById('color-select');
    const priceElement = document.getElementById('product-price');
    let basePrice = {{ $product->price }};
    let variants = @json($product->product_variants);

    function updatePrice() {
        let selectedSizeId = sizeSelect.value;
        let selectedColorId = colorSelect.value;

        let matchingVariant = variants.find(variant => 
            variant.size_id == selectedSizeId && variant.color_id == selectedColorId
        );

        if (matchingVariant) {
            priceElement.textContent = 'Giá: ' + matchingVariant.price;
            errorMessage.style.display = 'none'; // Ẩn thông báo lỗi
        } else {
            priceElement.textContent = 'Giá: ' + basePrice;
            errorMessage.textContent = 'Sản phẩm đã hết hàng';
            errorMessage.style.display = 'block'; // Hiển thị thông báo lỗi
        }
    }

    sizeSelect.addEventListener('change', updatePrice);
    colorSelect.addEventListener('change', updatePrice);
});
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sizeSelect = document.getElementById('size-select');
        const colorSelect = document.getElementById('color-select');
        const priceElement = document.getElementById('product-price');
        const errorMessage = document.getElementById('error-message');
        let basePrice = {{ $product->price }};
        let variants = @json($product->product_variants);
    
        function updatePrice() {
            let selectedSizeId = sizeSelect.value;
            let selectedColorId = colorSelect.value;
    
            let matchingVariant = variants.find(variant => 
                variant.size_id == selectedSizeId && variant.color_id == selectedColorId
            );
    
            if (matchingVariant) {
                priceElement.textContent = 'Giá: ' + matchingVariant.price;
                errorMessage.style.display = 'none'; // Ẩn thông báo lỗi
            } else {
                priceElement.textContent = 'Giá: ' + basePrice;
                errorMessage.textContent = 'Sản phẩm đã hết hàng';
                errorMessage.style.display = 'block'; // Hiển thị thông báo lỗi
            }
        }
    
        sizeSelect.addEventListener('change', updatePrice);
        colorSelect.addEventListener('change', updatePrice);
    });
    </script>
    

@endsection
