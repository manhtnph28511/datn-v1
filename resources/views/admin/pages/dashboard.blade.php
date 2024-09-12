@extends('admin.layouts.app')

@section('app')
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">Dashboard</span>
        </div>

        <form action="{{ route('admin.dashboard') }}" method="GET" class="filter-form">
            @csrf
            <label for="start_date">Từ ngày:</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $startDate) }}">
            <label for="end_date">Đến ngày:</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $endDate) }}">
            <button type="submit" class="btn btn-primary">Lọc</button>

           
        </form>

        <div class="boxes">
            <div class="box box1" style="width:1200px">
                <span class="text">Số đơn hàng được đặt</span>
                <span class="text">{{ $totalOrders }}</span>
            </div>
            <div class="box box2" style="width:1200px">
                <span class="text">Người đặt hàng nhiều nhất</span>
                @if(!empty($topCustomerNames))
                    <ul>
                        @foreach ($topCustomerNames as $customerName)
                            <li>{{ $customerName }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Không có dữ liệu</p>
                @endif
            </div>
            
            </div>
            
            <div class="box box3" style="height:125px">
                <span class="text">Doanh thu</span>
                <span class="text">{{ number_format($totalRevenue, 2, '.', ',') }} VND</span>
            </div>
            <div class="box box4" style="background-color:rgb(73, 172, 124)">
                <span class="text">Sản phẩm bán chạy nhất</span>
                <ul>
                    @foreach ($topProductNames as $productName)
                        <li>{{ $productName }}</li>
                    @endforeach
                </ul>
            </div>
            

            <div class="box box5 " style="background-color:rgb(197, 104, 203)">
                <span class="text">Sản phẩm có lượt xem cao nhất</span>
                <span class="text">{{ $topViewedProductName }}</span>
                <span class="views" style="color:black">{{ $topViewedProductViews }} lượt xem</span>
            </div>

            <div class="box box6" style="background-color:aliceblue">
                <span class="text">Sản phẩm có đánh giá cao nhất</span>
                <span class="text">{{ $topRatedProductName }}</span>
                <span class="rating">{{ $topRatedProductRating }} sao</span>
            </div>
        </div>
    </div>

    <div class="activity">
        <div class="title">
            <i class="uil uil-clock-three"></i>
            <span class="text">Thống kê</span>
        </div>
    </div>
</div>
@endsection

<style>

/* Dash Content */
.dash-content {
    padding: 20px;
}

.overview {
    margin-bottom: 20px;
}

.title {
    display: flex;
    align-items: center;
    font-size: 24px;
    margin-bottom: 10px;
}

.title i {
    margin-right: 10px;
    font-size: 28px;
}


.boxes {
    display: flex;
    flex-direction: column;
}

.box {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 20px; /* Space between boxes */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.box1 {
    background-color: #fff;
}

.box2 {
    background-color: #e3f2fd;
}

.box3 {
    background-color: #c8e6c9;
}

.box4 {
    background-color: rgb(73, 172, 124);
    color: #fff;
}

.box5 {
    background-color: rgb(197, 104, 203);
    color: #fff;
}

.box6 {
    background-color: aliceblue;
}

.box span.text {
    display: block;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.box ul {
    list-style-type: none;
    padding: 0;
}

.box ul li {
    margin-bottom: 5px;
    text-align: center;
}

.box .views,
.box .rating {
    display: block;
    font-size: 16px;
    text-align: center;
}
.text{
    text-align: center;
}

.activity {
    margin-top: 20px;
}

.activity .title {
    font-size: 22px;
}

.activity i {
    margin-right: 10px;
    font-size: 26px;
}

.filter-form {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    flex-wrap: nowrap;
}

.filter-form label {
    font-size: 14px;
    font-weight: bold;
}

.filter-form input[type="date"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    min-width: 120px; /* Đặt chiều rộng tối thiểu */
    flex-grow: 1; /* Cho phép trường nhập liệu mở rộng */
}

.filter-form button {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    flex-shrink: 0; /* Ngăn nút bấm co lại */
}


</style>
