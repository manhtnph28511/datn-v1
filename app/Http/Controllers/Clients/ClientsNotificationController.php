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
        if ($notification->is_read == 0) {
            $notification->is_read = 1;
            $notification->save();
        }

        $data = json_decode($notification->data);
        $orderId = $data->order_id ?? null;

        if ($orderId) {
            $orderDetails = OrderDetail::where('order_id', $orderId)->get();
            $productIds = $orderDetails->pluck('pro_id')->unique();
            $notification->productIds = $productIds;
        } else {
            $notification->productIds = collect();
        }
    }


    $clientUnreadNotificationsCount = ClientsNotification::where('user_id', $user->id)
        ->where('is_read', 0)
        ->count();
    session(['clientUnreadNotificationsCount' => $clientUnreadNotificationsCount]);

    return view('clients.pages.notifications.index', compact('notifications'));
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
      
        $notification = ClientsNotification::findOrFail($id);
        
       
        $notification->is_read = true;
        $notification->save();
    
        
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
    
        
        $data = json_decode($notification->data);
        var_dump($data);
    
        
        if (isset($data->order_id)) {
            $orderId = $data->order_id;
    
      
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
    

    

     public function review($orderId, $productId)
{
    // Tìm chi tiết đơn hàng với orderId và productId
    $orderDetail = OrderDetail::where('order_id', $orderId)
                               ->where('pro_id', $productId)
                               ->firstOrFail();

    // Lấy thông tin sản phẩm, kích thước, màu sắc liên quan
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



     
    


