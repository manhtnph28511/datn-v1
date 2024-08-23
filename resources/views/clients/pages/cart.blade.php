@extends('clients.layouts.app')

@section('title')
    Giỏ hàng
@endsection

@section('app')
    <section id="page-header" class="about-header">
        <h2>#Xin chào</h2>
        <p>Đây là giỏ hàng của bạn</p>
    </section>

       
    @if (count($carts) > 0)
        <section id="cart" class="section-p1">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Xóa</td>
                        <td>Ảnh</td>
                        <td>Sản phẩm</td>
                        <td>Size</td>
                        <td>Màu</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Tổng giá</td>
                        {{-- <td>Voucher</td>
                        <td>Giá sau khi sử dụng voucher</td> --}}
                    </tr>
                </thead>

                @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                @php
                    $total = 0;
                @endphp
                <tbody class="cart-box">
                    @foreach ($carts as $cart)
                        @php
                            $price = floatval($cart->price);
                            $quantity = intval($cart->quantity);
                            $itemTotal = $quantity * $price;
                            $total += $itemTotal;
                        @endphp
                        <tr class="pro-box">
                            <td>
                                <a href="{{ route('home.cart.destroy', $cart->id) }}"
                                    onclick="return confirm(`Bạn có muốn xóa không??`)">
                                    <i class="far fa-times-circle"></i>
                                </a>
                            </td>
                            <td><img src="{{ $cart->image }}" alt=""></td>
                            <td>{{ $cart->proName }}</td>
                            <td>{{ $cart->sizeName ?? 'N/A' }}</td>
                            <td>{{ $cart->colorName ?? 'N/A' }}</td>
                            <td>{{ number_format($price) }}</td>
                            <td>
                                <form action="{{ route('home.cart.updateCart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $cart->id }}">
                                    <input type="hidden" name="pro_id" value="{{ $cart->pro_id }}">
                                    <input type="hidden" name="size_id" value="{{ $cart->size_id }}">
                                    <input type="hidden" name="color_id" value="{{ $cart->color_id }}">
                                    <input type="number" value="{{ $quantity }}"
                                        class="border w-[40px] h-[40px] text-center" name="quantity">
                                    <button
                                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-3 py-2 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        Cập nhật
                                    </button>
                                </form>
                            </td>
                             <td>{{ number_format($itemTotal) }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section id="cart-add" class="section-p1 justify-content-end">
            <div id="subtotal">
                <h3>Cart totals</h3>
                <h3 style="color: red">Freeship toàn quốc</h3>
                <table>
                    <tr>
                        <td>Shipping</td>
                        <td>Free</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>{{ number_format($total) }}</strong></td>
                    </tr>
                </table>
                <a class="btn btn-success" href="{{ route('home.cart.voucher') }}">Tiến hàng đặt hàng</a>
            </div>
        </section>
    @else
        <div class="mx-auto w-[600px]">
            <img src="{{ asset('assets/imgs/cart-empty.png') }}" alt="" class="w-[100%] h-[400px]">
            <p class="text-center text-sm text-gray-400">Giỏ hàng của bạn đang trống</p>
            <a href="{{ route('home-client') }}"
                class="w-[200px] text-center block text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 my-2 mx-auto">Mua
                sắm nào</a>
        </div>
    @endif
@endsection

<style>
    .alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
</style>
