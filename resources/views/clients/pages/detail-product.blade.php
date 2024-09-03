
@extends('clients.layouts.app')

@section('app')
<section id="prodetails" class="section-p1">
    <div class="single-pro-image">
        <div class="slideshow-container">
            <!-- Slide Images -->
            <div class="mySlides">
                <img src="{{ $product->image }}" class="slide-img" id="mainImg" alt="Product Image">
            </div>
            @foreach($product->product_variants as $variant)
                @if($variant->image_variant)
                <div class="mySlides">
                    <img src="{{ $variant->image_variant }}" class="slide-img" alt="Variant Image">
                </div>
                @endif
            @endforeach
           
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>


    <div class="single-pro-detail">
        <form action="{{ route('clients.wishlists.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="size_id" value="{{ $selectedSizeId }}">
            <input type="hidden" name="color_id" value="{{ $selectedColorId }}">
            <button type="submit" class="normal" style="margin:0px 0px 20px 0px">Yêu thích</button>
        </form>
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

           
            <p id="product-price">Giá: {{ number_format($product->price, 2, '.', ',') }}</p>


           
            

            <div class="select-container">
                <select name="size_id" id="size-select">
                    <option value="">Chọn kích thước</option>
                    @foreach($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>
            
            
            <div class="select-container">
                <select name="color_id" id="color-select">
                    <option value="">Chọn màu sắc</option>
                    @foreach($colors as $color)
                        <option value="{{ $color->id }}" style="background-color: {{ $color->hex_code }};">{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="number" value="1" min="1" class="number-input" name="quantity" style="height: 30px">

            <button class="normal">Thêm vào giỏ hàng</button>
        </form>

        
        <h4>Chi tiết sản phẩm</h4>
        <span>{!! $product->description !!}</span>


        <div class="container">
           
        
            <h2>Đánh giá</h2>
        
            @forelse($product->ratings as $rating) 
                <div>
                    <strong>{{ $rating->user->name ?? 'Người dùng không xác định' }}:</strong> 
                    @if($rating->rating !== null)
                       <p>Đánh giá: {{ $rating->rating }} Sao</p>
                    @endif
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
    const mainImg = document.getElementById('mainImg');
    let basePrice = {{ $product->price }};
    let baseImage = '{{ $product->image }}'; // Đường dẫn ảnh sản phẩm chính từ URL hoặc đường dẫn khác
    let variants = @json($product->product_variants);

    function updatePriceAndImage() {
        let selectedSizeId = sizeSelect.value;
        let selectedColorId = colorSelect.value;

        if (!selectedSizeId || !selectedColorId) {
            priceElement.textContent = 'Giá: ' + basePrice;
            mainImg.src = baseImage; // Hiển thị ảnh sản phẩm chính nếu chưa chọn đủ size và màu
            return;
        }

        let matchingVariant = variants.find(variant => 
            variant.size_id == selectedSizeId && variant.color_id == selectedColorId
        );

        if (matchingVariant) {
            priceElement.textContent = 'Giá: ' + matchingVariant.price;
            if (matchingVariant.image_variant) {
                mainImg.src = '' + matchingVariant.image_variant; // Đường dẫn ảnh biến thể từ Storage
            } else {
                mainImg.src = baseImage; // Hiển thị ảnh sản phẩm chính nếu không có ảnh biến thể
            }
        } else {
            priceElement.textContent = 'Giá: ' + basePrice;
            mainImg.src = baseImage; // Hiển thị ảnh sản phẩm chính nếu không tìm thấy biến thể
        }
    }

    sizeSelect.addEventListener('change', updatePriceAndImage);
    colorSelect.addEventListener('change', updatePriceAndImage);
});



</script>


<script>
    let slideIndex = 1;
  showSlides(slideIndex);
  
  
  function plusSlides(n) {
      showSlides(slideIndex += n);
  }
  
 
  function currentSlide(n) {
      showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      if (n > slides.length) { slideIndex = 1 }
      if (n < 1) { slideIndex = slides.length }
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      slides[slideIndex - 1].style.display = "block";
  }
  
  
  setInterval(() => {
      plusSlides(1);
  }, 5000);
  
  </script>
      

@endsection
    
<style>

.slideshow-container {
    position: relative;
    max-width: 100%;
    margin: auto;
    overflow: hidden;
}


.mySlides {
    display: none;
}


.slide-img {
    width: 100%;
    height: auto;
}


.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    background-color: rgba(0, 0, 0, 0.5); 
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}
button.normal {
    background-color: #ff5a5f; 
    color: white; 
    border: none; 
    padding: 10px 20px; 
    text-align: center; 
    text-decoration: none; 
    display: inline-block; 
    font-size: 16px;
    margin: 4px 2px; 
    cursor: pointer; 
    border-radius: 5px; 
    transition: background-color 0.3s; 
}

button.normal:hover {
    background-color: #e14e53; 
}


#error-message {
    background-color: #f8d7da; 
    color: #721c24; 
    border: 1px solid #f5c6cb; 
    border-radius: 5px; 
    padding: 10px; /
    margin-bottom: 15px;
}


#success-message {
    background-color: #d4edda; 
    color: #155724; 
    border: 1px solid #c3e6cb;
    border-radius: 5px; 
    padding: 10px; 
}


.select-container {
    position: relative;
    display: inline-block;
    width: 200px; 
    margin-bottom: 15px; 
}


.select-container select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    font-size: 16px;
    font-family: Arial, sans-serif;
    cursor: pointer;
}


#color-select option {
    background-color: transparent; 
}

#color-select option[data-color] {
    background-color: var(--option-color); 

}
.select-container option {
    padding: 10px;
    background-color: #fff;
    border-bottom: 1px solid #ddd;
}

.select-container option:hover {
    background-color: #f1f1f1;
}


#color-select option[data-color] {
    background-color: #f0f0f0;
    color: #000;
}



.number-input {
    width: 100%; 
    padding: 10px; 
    border: 1px solid #ccc; 
    border-radius: 5px; 
    font-size: 16px; 
    font-family: Arial, sans-serif; 
    color: #333; 
    background-color: #fff; 
    box-sizing: border-box; 
    text-align: center; 
}


.number-input::-webkit-inner-spin-button,
.number-input::-webkit-outer-spin-button {
    -webkit-appearance: none; 
    margin: 0; 
}

.number-input[type=number] {
    -moz-appearance: textfield; 
}

.number-input:focus {
    border-color: #007bff; 
    outline: none; 
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); 
}

</style>

