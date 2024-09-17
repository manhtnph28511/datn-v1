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

    public function index()
{
    $user = auth()->user();
    $notifications = ClientsNotification::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    
   
    foreach ($notifications as $notification) {
         
        $data = json_decode($notification->data);
        $orderId = $data->order_id ?? null;

        if (isset($data->order_id)) {
       
        $order = Order::find($data->order_id);
    } else {
        $order = null; 
    }

        if ($orderId) {
            $orderDetails = OrderDetail::where('order_id', $orderId)->get();
            $productIds = $orderDetails->pluck('pro_id')->unique();
            $notification->productIds = $productIds;
        } else {
            $notification->productIds = collect();
        }
    }


   

    return view('clients.pages.notifications.index', compact('notifications','order'));
}





    public function delete($id)
    {
        $notification = ClientsNotification::find($id);
        if ($notification) {
            $notification->delete();
        }
        return back();
    }




    public function cancelOrder($id)
{
    $notification = ClientsNotification::findOrFail($id);
    $data = json_decode($notification->data);

    // Kiểm tra trạng thái type
    if (trim($notification->type) !== 'đã đặt hàng') {
        return redirect()->back()->with('error', 'Không thể hủy đơn hàng với trạng thái này.');
    }

    if (isset($data->order_id)) {
        $orderId = $data->order_id;

        // Tạo thông báo yêu cầu hủy đơn hàng
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
            'is_read' => true,
        ]);

        return redirect()->back()->with('success', 'Yêu cầu hủy đơn hàng đã được gửi đến admin.');
    } else {
        return redirect()->back()->with('error', 'Thông tin đơn hàng không tồn tại.');
    }
}


    

    

     public function review($orderId, $productId)
{
    
    $orderDetail = OrderDetail::where('order_id', $orderId)
                               ->where('pro_id', $productId)
                               ->firstOrFail();

   
    $sizes = Size::all();
    $colors = Color::all();
    $product = Product::findOrFail($productId);
    $selectedSizeId = $orderDetail->size_id;
    $selectedColorId = $orderDetail->color_id;

    
    return view('clients.pages.detail-product', [
        'orderDetail' => $orderDetail,
        'product' => $product,
        'selectedSizeId' => $selectedSizeId,
        'selectedColorId' => $selectedColorId,
        'sizes'=> $sizes,
        'colors'=>$colors
    ]);
}


public function getClientUnreadNotificationsCount()
    {
        return Notification::where('is_read', false)->count();
    }
}



     
    


