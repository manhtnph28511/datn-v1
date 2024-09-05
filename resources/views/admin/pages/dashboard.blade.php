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
            <div class="box box1">
                <span class="text">Số đơn hàng được đặt</span>
                <span class="number">{{ $totalOrders }}</span>
            </div>
            <div class="box box2">
                <span class="text">Người đặt hàng nhiều nhất</span>
                <span class="number">{{ $topCustomerName }}</span>
            </div>
            <div class="box box3" style="height:125px">
                <span class="text">Doanh thu</span>
                <span class="text">{{ number_format($totalRevenue, 2, '.', ',') }} VND</span>
            </div>
            <div class="box box4" style="background-color:rgb(73, 172, 124)">
                <span class="text">Sản phẩm bán chạy nhất</span>
                <span class="number">{{ $topProductName }}</span>
            </div>

            <div class="box box5 " style="background-color:rgb(197, 104, 203)">
                <span class="text">Sản phẩm có lượt xem cao nhất</span>
                <span class="text">{{ $topViewedProductName }}</span>
                <span class="views">{{ $topViewedProductViews }} lượt xem</span>
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

.dash-content {
    padding: 20px;
    background-color: #f4f7f9;
}


.filter-form {
    margin-bottom: 20px;
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.filter-form label {
    font-weight: bold;
}

.filter-form input[type="date"] {
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.filter-form button {
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

.filter-form button:hover {
    background-color: #0056b3;
}


.boxes {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-top: 20px;
}


.box {
    padding: 20px;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}


.box i {
    font-size: 24px;
    */
}


.box .text {
    display: block;
    font-size: 14px;
    color: #555;
    margin-top: 5px;
}


.box .number {
    display: block;
    font-size: 20px; 
    font-weight: bold;
    color: #333;
}


.box5 {
    background-color: #e9f5ff;
}


.box3, .box5 {
    padding: 15px; 
}

.box3 .text, .box5 .text {
    font-size: 12px;
}

.box3 .number, .box5 .number {
    font-size: 18px; 
}


body {
    font-family: Arial, sans-serif;
    color: #333;
    line-height: 1.6;
}

.title i {
    font-size: 24px;
    margin-right: 8px;
    color: #007bff;
}

.title .text {
    font-size: 18px;
    font-weight: bold;
}


@media (max-width: 768px) {
    .boxes {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .boxes {
        grid-template-columns: 1fr;
    }
}


</style>
