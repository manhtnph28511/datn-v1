@extends('clients.layouts.app')
@section('app')
<section id="cart" class="section-p1">

    
    <table width="100%">
        <thead>
            <tr>
                <td>Ảnh</td>
                <td>Sản phẩm</td>
                <td>Giá</td>
                <td>Số lượng</td>
                <td>Tổng giá</td>
                <td>Voucher</td>   
                 
            </tr>
        </thead>
        <tbody class="cart-box">
            @php
                $final_price = 0;
            @endphp
        
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
        
            @foreach ($carts as $index => $cart)
            <td>
                @if(Str::startsWith($cart->image_variant, 'http')) <!-- Kiểm tra nếu URL bắt đầu bằng http (Cloudinary) -->
                    <img src="{{ $cart->image_variant }}" alt="Ảnh sản phẩm từ Cloudinary" class="cart-image">
                @else
                    <img src="{{ asset('storage/' . $cart->image_variant) }}" alt="Ảnh sản phẩm từ Storage" class="cart-image">
                @endif
            </td>
            
                <td class="w-[222px]">{{ $cart->proName }}</td>
                <td>{{ number_format($cart->price) }} VNĐ</td>
                <td>{{ $cart->quantity }}</td>
                <td>{{ number_format($cart->quantity * $cart->price) }} VNĐ</td>
                <td>
                    {{-- Hiển thị nút "Bạn có mã giảm giá?" --}}
                    <button type="button" class="btn btn-primary show-voucher-form" data-index="{{ $index }}">Bạn có mã giảm giá?</button>
                </td>
                <td class="discounted-price" style="display: none;">
                    @php
                        $discounted_price = $cart->discounted_total_price ?? ($cart->quantity * $cart->price);
                        $final_price += $discounted_price;
                    @endphp
                    {{ number_format($discounted_price) }} VNĐ
                </td>
            </tr>
        
            <tr id="voucher-form-{{ $index }}" class="voucher-form" style="display: none;">
                <td colspan="7">
                    <form action="{{ route('applyVoucher') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pro_id" value="{{ $cart->pro_id }}">
                        <input type="text" name="voucher_code" placeholder="Nhập mã voucher">
                        
                        <button type="submit" class="btn btn-primary">Sử dụng</button>
                    </form>
                </td>
            </tr>
            @endforeach


        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" style="text-align: right; font-weight: bold;">
                    Tổng tiền bạn phải trả: {{ number_format($final_price) }} VNĐ
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="mb-4">
        <form action="{{ route('clients.search-vouchers') }}" method="GET">
            @csrf
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-2">Tìm Voucher</button>
            </div>
        </form>
    </div>

    <div class="checkout">
        <a href="{{ route('home.cart.checkout') }}" class="btn btn-primary">Tiến hành thanh toán</a>
    </div>
   
    <div class="vouchertable" style="margin:10px">
        <p>Đây là voucher có sẵn của bạn</p>
    @if(isset($userVouchers) && $userVouchers->count() > 0)
    <table>
        <thead>
            <tr>
                <th>Mã Voucher</th>
                <th>Giảm Giá</th>
                <th>Loại giảm Giá</th>
                <th>Thời Gian Bắt Đầu</th>
                <th>Thời Gian Kết Thúc</th>
                <th>Trạng thái</th>
                <th>Chọn</th> 
                
            </tr>
        </thead>
        <tbody>
            @foreach($userVouchers as $userVoucher)
                <tr>
                    <td>{{ $userVoucher->voucher->code }}</td>
                    <td>
                        @if($userVoucher->voucher->discount_type === 'percentage')
                            {{ $userVoucher->voucher->discount }}%
                        @else
                            {{ number_format($userVoucher->voucher->discount) }} VND
                        @endif
                    </td>
                    <td>
                        @if(is_null($userVoucher->voucher->product_id))
                            Áp dụng cho mọi sản phẩm
                        @else
                            Áp dụng cho {{ $userVoucher->voucher->product->name }}
                        @endif
                    </td>
                    <td>{{ $userVoucher->voucher->starts_at->format('d-m-Y H:i:s') }}</td>
                    <td>{{ $userVoucher->voucher->expires_at->format('d-m-Y H:i:s') }}</td>
                    <td>
                        @if(now()->gt($userVoucher->voucher->expires_at))
                            <span class="text-danger">Hết hạn</span>
                        @else
                            <span class="text-success">Còn hạn</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary select-voucher" data-voucher-code="{{ $userVoucher->voucher->code }}">
                            Chọn
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    
@endif
</div>

</section>
@endsection



<script>
    document.addEventListener('DOMContentLoaded', function() {
    var showVoucherButtons = document.querySelectorAll('.show-voucher-form');
    var selectVoucherButtons = document.querySelectorAll('.select-voucher');

    showVoucherButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var index = button.getAttribute('data-index');
            var voucherForm = document.getElementById('voucher-form-' + index);
            var discountedPriceCell = button.closest('tr').querySelector('.discounted-price');

            voucherForm.style.display = 'table-row'; 
            discountedPriceCell.style.display = 'table-cell'; 

            button.style.display = 'none'; 
        });
    });

    selectVoucherButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var voucherCode = button.getAttribute('data-voucher-code');
            var voucherInput = document.querySelector('input[name="voucher_code"]');

            if (voucherInput) {
                voucherInput.value = voucherCode; 
            }
        });
    });
});
 </script>

<style>

#cart table {
    width: 100%;
    margin-bottom: 20px; 
}

#cart table td, #cart table th {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

#cart .cart-box td {
    vertical-align: top;
}


.voucher-form form {
    display: flex;
    flex-direction: column; 
}


.voucher-form input[type="text"] {
    padding: 6px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 10px; 
}

.voucher-form button {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: white;
    cursor: pointer;
}

.voucher-form button:hover {
    background-color: #0056b3;
}


#cart .discounted-price {
    text-align: right; 
    font-weight: bold; 
}


.cart-image-container {
    width: 150px;
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.cart-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
}


</style>