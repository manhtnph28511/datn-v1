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
                    <td>Thanh toán</td>
                    <td>Hành động</td>
                </tr>
            </thead>
            <tbody class="cart-box">
                @foreach ($orders as $row)
                    <tr class="pro-box">
                        <td>INV{{ $row->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i:s') }}</td>
                        <td>{{ number_format($row->total_price) }}đ</td>
                        <td>{{ getStatusOrder($row->order_status) }}</td>
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
