<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
class NotificationController extends Controller
{
    public function showNotifications()
    {
    
        Notification::where('is_read', false)->update(['is_read' => true]);

        
        $notifications = Notification::orderBy('created_at', 'desc')->get();

        
        $unreadNotificationsCount = 0;

        return view('admin.pages.notifications.index', compact('notifications', 'unreadNotificationsCount'));
    }



    public static function getUnreadNotificationsCount()
    {
        return Notification::where('is_read', false)->count();
    }

    public function store($orderId)
    {
        Notification::create([
            'order_id' => $orderId,
            'user_id' => null, // Hoặc ID của admin
            'type' => 'order_placed',
            'data' => json_encode([
                'order_id' => $orderId,
                'message' => 'Có đơn hàng mới!',
            ]),
            'is_read' => false,
        ]);
    }
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);

        return redirect()->route('admin.notifications.index');
    }

    // Xóa thông báo
    public function delete($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('admin.notifications.index');
    }

}
