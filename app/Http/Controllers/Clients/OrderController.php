<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function history()
    {
        $user = auth()->user();
        $orders = Order::with('orderDetails')->where('user_id', $user->id)->get()->map(function ($order) {
            $order->total_price = $order->orderDetails->sum('price');
            $order->total_quantity = $order->orderDetails->sum('quantity');
            return $order;
        });
        return view('clients.pages.orders.history', ['orders' => $orders]);
    }
    public function track(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'code' => 'nullable|string',
        // ]);

        // if ($validator->fails()) {
        //     toast($validator->errors(), 'error');
        //     return back();
        // }

        // if ($request->code != null) {
        //     $searchCode = preg_replace('/[^0-9]/', '', $request->code);
        //     $order = Order::where('id', $searchCode)
        //         ->where('user_id', auth()->user()->id)
        //         ->first();

        //     if (!is_null($order)) {
        //         $statuses = [
        //             'ORDERPLACE' => 'đã được tạo',
        //             'PACKED' => 'đã nhận và đang đóng gói',
        //             'SHIPPED' => 'đã được vận chuyển',
        //             'INTRANSIT' => 'đang trên đường đến điểm đến',
        //             'OUTFORDELIVERY' => 'đang được giao cho người nhận',
        //             'DELIVERED' => 'đã được giao hàng thành công',
        //             'DELAYED' => 'đã bị trễ hẹn trong quá trình vận chuyển',
        //             'EXCEPTION' => 'đã gặp vấn đề hoặc ngoại lệ trong quá trình vận chuyển',
        //             'RETURNED' => 'đã được hoàn trả lại cho người gửi'
        //         ];

        //         $statusFlow = [
        //             'ORDERPLACE' => ['ORDERPLACE'],
        //             'PACKED' => ['ORDERPLACE', 'PACKED'],
        //             'SHIPPED' => ['ORDERPLACE', 'PACKED', 'SHIPPED'],
        //             'INTRANSIT' => ['ORDERPLACE', 'PACKED', 'SHIPPED', 'INTRANSIT'],
        //             'OUTFORDELIVERY' => ['ORDERPLACE', 'PACKED', 'SHIPPED', 'INTRANSIT', 'OUTFORDELIVERY'],
        //             'DELIVERED' => ['ORDERPLACE', 'PACKED', 'SHIPPED', 'INTRANSIT', 'OUTFORDELIVERY', 'DELIVERED'],
        //             'DELAYED' => ['ORDERPLACE', 'PACKED', 'SHIPPED', 'INTRANSIT', 'OUTFORDELIVERY', 'DELAYED'],
        //             'EXCEPTION' => ['ORDERPLACE', 'PACKED', 'SHIPPED', 'INTRANSIT', 'OUTFORDELIVERY', 'EXCEPTION'],
        //             'RETURNED' => ['ORDERPLACE', 'PACKED', 'SHIPPED', 'INTRANSIT', 'OUTFORDELIVERY', 'RETURNED']
        //         ];

        //         if (isset($statuses[$order->shipment_status])) {
        //             $statusHistory = $statusFlow[$order->shipment_status];
        //             $statusDescriptions = array_map(function ($status, $index) use ($statuses) {
        //                 return [
        //                     'id' => $index + 1,
        //                     'status' => 'Đơn hàng ' . $statuses[$status]
        //                 ];
        //             }, $statusHistory, array_keys($statusHistory));
        //             toast('Tra cứu thành công', 'success');
        //             return view('clients.pages.orders.orderTrack', ['order' => $order, 'searchCode' => $searchCode,'statusDescriptions' => $statusDescriptions]);

        //         } else {
        //             toast('Mã hoá đơn không hợp lệ', 'error');
        //         }
        //     } else {
        //         toast('Không tìm thấy hoá đơn này', 'error');
        //     }
        //     return view('clients.pages.orders.orderTrack', ['searchCode' => $searchCode]);
        // } else {
        //     toast('Vui lòng nhập mã hoá đơn', 'error');
        //     return view('clients.pages.orders.orderTrack');
        // }
        if ($request->code != null) {
            $searchCode = $request->code;
            $searchCode = preg_replace('/[^0-9]/', '', $request->code);
            $order = Order::where('id', $searchCode)->where('user_id', auth()->user()->id)->first();

            if (!is_null($order)) {
                $view = view('clients.pages.orders.orderTrack', ['order' => $order, 'searchCode' => $searchCode]);
            } else {
                toast('Không tìm thấy hoá đơn này', 'error');
                $view = view('clients.pages.orders.orderTrack', ['searchCode' => $searchCode]);
            }
        } else {
            $view = view('clients.pages.orders.orderTrack');
        }
        return $view;
    }
}
