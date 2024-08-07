<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Order;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('clients.pages.notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            $notification->is_read = true;
            $notification->save();
        }
        return back();
    }

    public function delete($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            $notification->delete();
        }
        return back();
    }
    public function confirmReceived($id)
    {
        // Tìm thông báo theo ID
        $notification = Notification::findOrFail($id);
        
        // Đánh dấu thông báo đã đọc
        $notification->is_read = true;
        $notification->save();
    
        // Lấy thông tin đơn hàng từ dữ liệu thông báo
        $data = json_decode($notification->data);
        $orderId = $data->order_id ?? null;
    
        // Gửi thông báo cho admin nếu có đơn hàng
        if ($orderId) {
            // Giả sử bạn có một phương thức gửi thông báo cho admin
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
}
