@extends('clients.layouts.app')
@section('css')
    <style>
        #progress-bar {
            display: table;
            width: 100%;
            margin: 0;
            position: relative;
            z-index: 2;
            table-layout: fixed;
            padding: 0;
            counter-reset: step
        }

        #progress-bar li.tt-step {
            list-style-type: none;
            display: table-cell;
            width: 25%;
            float: left;
            position: relative;
            text-align: center
        }

        #progress-bar li.tt-step:before {
            width: 30px;
            height: 30px;
            color: #5d6374;
            content: counter(step);
            counter-increment: step;
            line-height: 30px;
            font-size: 14px;
            border: 1px solid #f4f4f4;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background-color: #fff
        }

        #progress-bar li.tt-step:after {
            width: 100%;
            height: 4px;
            content: "";
            position: absolute;
            background-color: #f4f4f4;
            top: 15px;
            left: -50%;
            z-index: -1
        }

        #progress-bar li.tt-step:first-child:after {
            content: none
        }

        #progress-bar li.tt-step.tt-step-done {
            color: #22c55e
        }

        #progress-bar li.tt-step.tt-step-done:before {
            border-color: #22c55e;
            background-color: #22c55e;
            color: #fff;
            content: "✓";
            font-family: "FontAwesome"
        }

        #progress-bar li.tt-step.tt-step-done+li:after {
            background-color: #22c55e
        }

        #progress-bar li.tt-step.active {
            color: #22c55e
        }

        #progress-bar li.tt-step.active:before {
            border-color: #22c55e;
            color: #22c55e;
            font-weight: 700
        }
    </style>
@endsection
@section('app')
    <section id="form-details" class="section-p1">
        <div class="order-tracking-wrap bg-white rounded py-5 px-4 w-100">

            <h6 class="mb-4">Theo dõi đơn hàng</h6>
            <form class="w-100 search-form flex items-center mb-5 justify-center" action="{{ route('order.track') }}">
                <div class="input-group mb-3 d-flex justify-content-center">
                    <input type="text" class="w-50" placeholder="Mã đơn hàng" name="code"
                        @isset($searchCode)
                                value="{{ $searchCode }}"
                                @endisset>
                    <button type="submit" class="btn btn-secondary px-3" style="height: 100%;padding: 12px;"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>

            @isset($order)
                <ol id="progress-bar">
                    <li class="fs-xs tt-step @if ($order->order_status != 'CANCEL') tt-step-done @else @endif">
                        Đơn hàng đã tạo</li>
                    <li
                        class="fs-xs tt-step @if (
                            ($order->shipment_status != 'CANCEL' && $order->shipment_status != 'ORDERPLACE') ||
                                ($order->order_status == 'PAID' && $order->shipment_status == 'PACKED')) tt-step-done @elseif ($order->order_status == 'PAID' && $order->shipment_status == 'PACKED') active @endif">
                        Đã nhận và đang đóng gói</li>
                    <li
                        class="fs-xs tt-step @if (
                            $order->shipment_status == 'SHIPPED' ||
                                $order->shipment_status == 'INTRANSIT' ||
                                $order->shipment_status == 'OUTFORDELIVERY' ||
                                $order->shipment_status == 'DELAYED' ||
                                $order->shipment_status == 'EXCEPTION' ||
                                $order->shipment_status == 'OUTFORDELIVERY' ||
                                $order->shipment_status == 'DELIVERED' ||
                                $order->shipment_status == 'RETURNED') tt-step-done @elseif ($order->shipment_status == 'SHIPPED') active @endif">
                        Đã được vận chuyển</li>
                    <li class="fs-xs tt-step @if ($order->shipment_status == 'DELIVERED') tt-step-done @endif">
                        Giao hàng thành công</li>
                </ol>

                <div class="table-responsive-md mt-5">
                    <table class="table table-bordered fs-xs">
                        <thead>
                            <tr>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Thông tin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i:s') }} </td>
                                <td>Đơn hàng đang được xử lý</td>
                            </tr>
                            @if ($order->orderUpdates && $order->orderUpdates->isNotEmpty())
                                @foreach ($order->orderUpdates as $orderUpdate)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($orderUpdate->created_at)->format('d-m-Y H:i:s') }}
                                        </td>
                                        <td>{{ $orderUpdate->note }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @endisset


        </div>
    </section>
@endsection
@section('js')
@endsection
