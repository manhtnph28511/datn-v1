<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientsNotification;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Order;
use App\Models\Size;
use App\Models\Color;


use App\Models\OrderDetail;

class ClientsNotificationController extends Controller
{
    // public function index()
    // {
    //     $notifications = ClientsNotification::orderBy('created_at', 'desc')->get();

    //     foreach ($notifications as $notification) {
    //         $data = json_decode($notification->data);
    //         $orderId = $data->order_id ?? null;
            
    //         if ($orderId) {
    //             // Lấy các sản phẩm trong đơn hàng
    //             $orderDetails = OrderDetail::where('order_id', $orderId)->get();
    //             $productIds = $orderDetails->pluck('pro_id')->unique(); // Danh sách product_id của sản phẩm trong đơn hàng
    //             $notification->productIds = $productIds;
    //         } else {
    //             $notification->productIds = collect(); // Gán giá trị mặc định nếu không có orderId
    //         }
    //     }
    //     return view('clients.pages.notifications.index', compact('notifications'));
    // }

    public function index()
{
    $notifications = ClientsNotification::orderBy('created_at', 'desc')->get();

    // Xử lý từng thông báo để lấy danh sách các sản phẩm liên quan
    foreach ($notifications as $notification) {
        $data = json_decode($notification->data);
        $orderId = $data->order_id ?? null;

        if ($orderId) {
            // Lấy các sản phẩm từ chi tiết đơn hàng
            $orderDetails = OrderDetail::where('order_id', $orderId)->get();
            $productIds = $orderDetails->pluck('pro_id')->unique(); // Danh sách các product_id

            // Gán danh sách productIds cho thông báo
            $notification->productIds = $productIds;
        } else {
            // Gán giá trị mặc định nếu không có orderId
            $notification->productIds = collect();
        }
    }

    // Trả về view với các thông báo
    return view('clients.pages.notifications.index', compact('notifications'));
}
    public function markAsRead($id)
    {
        $notification = ClientsNotification::find($id);
        if ($notification) {
            $notification->is_read = true;
            $notification->save();
        }
        return back();
    }

    public function delete($id)
    {
        $notification = ClientsNotification::find($id);
        if ($notification) {
            $notification->delete();
        }
        return back();
    }
    public function confirmReceived($id)
    {
        // Tìm thông báo theo ID
        $notification = ClientsNotification::findOrFail($id);
        
        // Đánh dấu thông báo đã đọc
        $notification->is_read = true;
        $notification->save();
    
        // Lấy thông tin đơn hàng từ dữ liệu thông báo
        $data = json_decode($notification->data);
        $orderId = $data->order_id ?? null;
    
        if ($orderId) {
            
            Notification::create([
                'type' => 'order_received_confirmation',
                'data' => json_encode([
                    'order_id' => $orderId,
                    'message' => 'Người dùng đã nhận hàng cho đơn hàng #' . $orderId,
                ]),
                'is_read' => false,
            ]);
        }
    
        return redirect()->back()->with('status', 'Cảm ơn bạn đã xác nhận');
    }

    public function cancelOrder($id)
    {
        $notification = ClientsNotification::findOrFail($id);
    
        // Giải mã dữ liệu thông báo
        $data = json_decode($notification->data);
        var_dump($data);
    
        // Kiểm tra nếu $data và $data->order_id tồn tại
        if (isset($data->order_id)) {
            $orderId = $data->order_id;
    
            // Tạo thông báo mới cho admin
            Notification::create([
                'user_id' => auth()->user()->id,
                'type' => 'order_cancel_request',
                'data' => json_encode([
                    'order_id' => $orderId,
                    'message' => 'Người dùng yêu cầu hủy đơn hàng #' . $orderId . '.',
                ]),
                'is_read' => false,
            ]);


            ClientsNotification::create([
                'user_id' => auth()->user()->id,
                'type' => 'order_cancel_request',
                'data' => json_encode([
                    'order_id' => $orderId,
                    'message' => 'Bạn đã yêu cầu hủy đơn hàng #' . $orderId . '.',
                ]),
                'is_read' => false,
            ]);
    
            return redirect()->back()->with('success', 'Yêu cầu hủy đơn hàng đã được gửi đến admin.');
        } else {
            return redirect()->back()->with('error', 'Thông tin đơn hàng không tồn tại.');
        }
     }
    

    

     public function review($orderId)
{
    // Lấy thông tin đơn hàng chi tiết
    $orderDetail = OrderDetail::where('order_id', $orderId)->firstOrFail();

    // Lấy thông tin sản phẩm dựa vào pro_id
    $sizes = Size::all();
    $colors = Color::all();
    $product = Product::findOrFail($orderDetail->pro_id);
    $selectedSizeId = $orderDetail->size_id;
    $selectedColorId = $orderDetail->color_id;
    // Trả về view với dữ liệu đơn hàng chi tiết và sản phẩm
    return view('clients.pages.detail-product', [
        'orderDetail' => $orderDetail,
        'product' => $product,
        'selectedSizeId' => $selectedSizeId,
        'selectedColorId' => $selectedColorId,
        'sizes'=> $sizes,
        'colors'=>$colors
    ]);
}
}



     
    


