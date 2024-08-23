<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientsNotification;
use App\Models\Notification;

class ClientsNotificationController extends Controller
{
    public function index()
    {
        $notifications = ClientsNotification::orderBy('created_at', 'desc')->get();
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
    

}
