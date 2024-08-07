@extends('clients.layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.bootstrap5.css">
@endsection
@section('app')
    <section id="cart" class="section-p1">
        <table width="100%" id="order-history-table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Thời gian</td>
                    <td>Tổng tiền</td>
                    <td>Số lượng</td>
                    <td>Thanh toán</td>
                    <td>Hành động</td>
                </tr>
            </thead>
            <tbody class="cart-box">
                @foreach ($orders as $row)
                    <tr class="pro-box">
                        <td>INV{{ $row->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i:s') }}</td>
                        <td>{{ number_format($row->total_price) }}{{ number_format($row->total_price) }}đ</td>
                        <td>{{ number_format($row->total_quantity) }}</td>
                        <td>{{ ($row->payment) }}</td>                     
                        <td>
                            <a href="{{ route('order.track', ['code' => $row->id]) }}" class="view-invoice fs-xs me-2"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Theo dõi đơn hàng"><i
                                    class="fas fa-truck text-dark"></i></a>
                            <a href="asc" class="view-invoice fs-xs"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Xem hoá đơn"><i
                                    class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <a href="{{route('clients.index')}}">quay lại</a>
            </tbody>
        </table>
    </section>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.bootstrap5.js"></script>
    <script>
        new DataTable('#order-history-table', {
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details for ' + data[0] + ' ' + data[1];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            }
        });
    </script>
@endsection
<style>
    /* Đảm bảo bảng có kiểu dáng đẹp và dễ đọc */
    table {
        width: 100%;
        border-collapse: separate; /* Đảm bảo các ô không bị dính vào nhau */
        border-spacing: 0; /* Khoảng cách giữa các ô */
    }

    table th, table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        vertical-align: middle; /* Căn giữa theo chiều dọc */
    }

    table th {
        background-color: #f4f4f4;
        color: #333;
        font-weight: bold;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    /* Đảm bảo rằng các nút hành động có kiểu dáng nhất quán */
    a.view-invoice {
        color: #007bff;
        text-decoration: none;
        margin-right: 10px;
    }

    a.view-invoice:hover {
        text-decoration: underline;
        color: #0056b3;
    }

    /* Đảm bảo bảng được làm mới đúng khi DataTables hoạt động */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 5px 10px;
        margin: 0 2px;
    }

    .dataTables_wrapper .dataTables_filter input {
        margin-left: 0.5em;
        border: 1px solid #ccc;
        padding: 0.5em;
        border-radius: 4px;
    }

    .dataTables_wrapper .dataTables_length select {
        padding: 0.5em;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>