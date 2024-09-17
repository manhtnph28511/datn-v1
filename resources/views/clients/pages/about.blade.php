@extends('clients.layouts.app')
@section('title') About @endsection
@section('app')
    <section id="page-header" class="about-header">
        <h2>Bạn có biết?</h2>
        <p>Giới thiệu về chúng tôi</p>
    </section>
    <section id="about-head" class="section-p1">
        <img src="{{ asset('assets/imgs/about/a6.jpg')  }}" alt="">
        <div>
            <h2>Giới thiệu</h2>
            <p>Khám Phá Phong Cách Mới – Bộ Sưu Tập X Chỉ Tại Chúng Tôi!”
                Với thiết kế độc lạ, hoa văn có 102. Bước vào thế giới thời trang mới với bộ sưu tập đặc biệt, nơi sự sáng tạo và phong cách hội tụ. Đánh thức phong cách của bạn và biến mỗi ngày trở nên đặc biệt với những thiết kế tinh tế và độc đáo
                Chất liệu cao cấp và thiết kế tinh tế làm nổi bật vẻ đẹp tự nhiên của bạn. Từ những chi tiết nhỏ nhưng tinh tế đến đường may chắc chắn, mỗi sản phẩm đều được chăm chút kỹ lưỡng để mang lại trải nghiệm thoải mái và phong cách tuyệt vời.
                Hãy để chúng tôi cùng bạn tạo nên những khoảnh khắc thời trang đáng nhớ. Đặt hàng ngay để đón nhận phong cách mới!</p>
            <abbr title="">
            </abbr>
            <br> <br>

            <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">Ghé ngay cửa hàng của chúng tôi tại:Nam từ liêm ,Hà nội
            </marquee>
        </div>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f1.png')  }}" alt="">
            <h6>Miễn phí vận chuyển</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f2.png')  }}" alt="">
            <h6>Đặt hàng trực tuyến</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f3.png')  }}" alt="">
            <h6>Tiết kiệm tiền bạc</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f4.png')  }}" alt="">
            <h6>Nhiều ưu đãi</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f5.png')  }}" alt="">
            <h6>Vui vẻ</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f6.png')  }}" alt="">
            <h6>Hỗ trợ 24.7</h6>
        </div>
    </section>
    <section id="newletter" class="section-p1">
        <div class="newtext">
            <h4>Sản phẩm chất lượng</h4>
            <p>Đăng kí ngay và mua sắm nào <span>Nhận nhiều ưu đãi</span></p>
        </div>
        <div class="form">
        </div>
    </section>
   
@endsection
