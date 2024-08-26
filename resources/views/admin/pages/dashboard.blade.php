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
                <i class="uil uil-thumbs-up"></i>
                <span class="text">Total Orders</span>
                <span class="number">{{ $totalOrders }}</span>
            </div>
            <div class="box box2">
                <i class="uil uil-comments"></i>
                <span class="text">Top Customer</span>
                <span class="number">{{ $topCustomerName }}</span>
            </div>
            <div class="box box3">
                <i class="uil uil-share"></i>
                <span class="text">Total Revenue</span>
                <span class="number">{{ number_format($totalRevenue, 2, '.', ',') }} VND</span>
            </div>
            <div class="box box4">
                <i class="uil uil-product-hunt"></i>
                <span class="text">Top Product</span>
                <span class="number">{{ $topProductName }}</span>
            </div>
        </div>
    </div>

    <div class="activity">
        <div class="title">
            <i class="uil uil-clock-three"></i>
            <span class="text">Recent Activity</span>
        </div>
        <!-- Thêm thông tin hoạt động gần đây nếu cần -->
    </div>
</div>
@endsection
