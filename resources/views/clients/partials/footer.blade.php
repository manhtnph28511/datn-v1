<footer class="section-p1">
    <div class="col">
        <img class="logofooter" src="{{ asset('assets/imgs/logo2.png') }}" alt="" >
        <h4>Liên hệ</h4>
        <p><strong>Địa chỉ:</strong> 
            113 Hùng Vương, Điện Biên, Ba Đình, Hà Nội, Việt Nam</p>
        <p><strong>Điện thoại:</strong> +84 987654321</p>
        <p><strong>Giờ làm việc:</strong> 08:00 - 17:00, Thứ Hai - Thứ Bảy</p>
        <div class="follow">
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>

    <div class="col">
        <h4>Liên hệ</h4>
        <a href="#">Về chúng tôi</a>
        <a href="#">Thông tin giao hàng</a>
        <a href="#">Chính sách giá</a>
        <a href="#">Điều khoản & Điều kiện</a>
        <a href="#">Liên hệ với chúng tôi</a>
    </div>

    <div class="col">
        <a href="{{route('clients.profile')}}">Tài khoản của tôi</a>
        <a href="{{ route('account.login') }}">Đăng nhập</a>
        <a href="{{ route('home.cart') }}">Xem giỏ hàng</a>
        <a href="{{ route('clients.users.wishlists') }}">Danh sách yêu thích của tôi</a>
        <a href="{{route('order.track')}}">Theo dõi đơn hàng của tôi</a>
        <a href="#">Trợ giúp</a>
    </div>

    <div class="col install">
        <h4>XEM TRANG WEB</h4>
        <p>Google chrome or Microsoft Edge</p>
        <div class="row">
            <img src="{{ asset('assets/imgs/pay/app.jpg') }}" alt="">
            <img src="{{ asset('assets/imgs/pay/play.jpg') }}" alt="">
        </div>
        <p>Secured Payment Gateways</p>
        <img src="{{ asset('assets/imgs/pay/pay.png') }}" alt="">
    </div>
</footer>
<script src="{{ asset('assets/js/clients/home-script.js')  }}"></script>

<style>
    .logofooter>img{
        width: 120px;
        height: 10px;
    }
</style>
