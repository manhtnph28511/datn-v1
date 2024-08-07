{{-- @extends('clients.layouts.app')
@section('app')
    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
    <form action="{{ route('home.cart.checkout-step') }}" method="POST">
        @csrf
        <section id="cart" class="section-p1">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Ảnh</td>
                        <td>Sản phẩm</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Tổng giá</td>
                    </tr>
                </thead>
                <tbody class="cart-box">
                    @php
                        $total = 0;
                        $sumTotal = 0;
                    @endphp
                    @foreach ($carts as $cart)
                        <tr class="pro-box">
                            <td><img src="{{ $cart->image }}" alt="" class="mx-auto"></td>
                            <td class="w-[222px]">{{ $cart->proName }}</td>
                            <td>{{ number_format($cart->price) }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ number_format($cart->quantity * $cart->price) }}</td>
                        </tr>
                        @php
                            $total = $total += $cart->quantity * $cart->price;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </section>

        <section id="cart-add" class="section-p1 justify-content-end">
            <div id="coupon">
                <h3>Thông tin cá nhân</h3>
                <div class="mt-2">
                    <input type="text" name="username" value="{{ Auth::user()->name }}" class=""
                        placeholder="Tên của bạn">
                </div>
                <div class="mt-2">
                    <input type="text" name="username" value="{{ Auth::user()->email }}" class=""
                        placeholder="Email của bạn">
                </div>
                <div class="mt-2">
                    <input type="text" name="address" value="{{ Auth::user()->address }}" class=""
                        placeholder="Địa chỉ nhận hàng của bạn">
                </div>
                <div class="mt-2" class="mr-3">
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class=""
                        placeholder="Số điện thoại">
                </div>

            </div>
            <div id="subtotal">
                <h3>Tổng giá giỏ hàng</h3>
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
                <button class="btn btn-success">Hoàn tất đặt hàng</button>
            </div>
        </section>
    </form>
@endsection --}}

@extends('clients.layouts.app')

@section('app')
    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>

    <form action="{{ route('home.cart.checkout-step') }}" method="POST">
        @csrf
        <section id="cart" class="section-p1">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Ảnh</td>
                        <td>Sản phẩm</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Tổng giá</td>
                    </tr>
                </thead>
                <tbody class="cart-box">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($carts as $cart)
                        <tr class="pro-box">
                            <td><img src="{{ $cart->image }}" alt="" class="mx-auto"></td>
                            <td class="w-[222px]">{{ $cart->proName }}</td>
                            <td>{{ number_format($cart->price) }} VNĐ</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ number_format($cart->quantity * $cart->price) }} VNĐ</td>
                        </tr>
                        @php
                            $total += $cart->quantity * $cart->price;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </section>

        <section id="cart-add" class="section-p1 justify-content-end">
            <div id="coupon">
                <h3>Thông tin cá nhân</h3>
                <div class="mt-2">
                    <input type="text" name="username" value="{{ old('username', Auth::user()->name) }}" class=""
                        placeholder="Tên của bạn">
                </div>
                @error('user_name')
                    <p class="my-2 text-red-400">{{ $message }}</p>
                @enderror
                <div class="mt-2">
                    <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}" class=""
                        placeholder="Địa chỉ nhận hàng của bạn">
                </div>
                @error('address')
                    <p class="my-2 text-red-400">{{ $message }}</p>
                @enderror
                <div class="mt-2">
                    <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" class=""
                        placeholder="Số điện thoại">
                </div>
                <div class="mt-2">
                    <input type="text" name="email" value="{{ old('email', Auth::user()->email) }}" class=""
                        placeholder="Email">
                </div>
                @error('phone')
                    <p class="my-2 text-red-400">{{ $message }}</p>
                @enderror
                <div class="mt-2">
                    <textarea name="note" class="" placeholder="Ghi chú (nếu có)">{{ old('note') }}</textarea>
                </div>
            </div>
            <div id="subtotal">
                <h3>Tổng giá giỏ hàng</h3>
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
                <select name="type_order" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="0">Chọn phương thức thanh toán</option>
                    <option value="1" {{ old('type_order') === '1' ? 'selected' : false }}>Thanh toán online
                    </option>
                    <option value="2" {{ old('type_order') === '2' ? 'selected' : false }}>Thanh toán khi nhận hàng
                    </option>
                </select>
                @error('type_order')
                    <p class="my-2 text-red-400">{{ $message }}</p>
                @enderror
                <br>
                <button type="submit" class="btn btn-success">Hoàn tất đặt hàng</button>
            </div>
        </section>
    </form>
@endsection
