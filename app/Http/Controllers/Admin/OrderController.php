<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientsNotification;
use App\Models\Order;
use App\Models\OrderUpdate;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;//thư viện quản lí ngày giờ
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class OrderController extends Controller
{
    public function index()
{
    $orders = Order::orderBy('created_at', 'desc')->paginate(10);

    return view('admin.pages.orders.index', compact('orders'));
}


    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.pages.orders.show', compact('order'));
    }
    public function search(Request $request)
    {
        $order_status = $request->input('order_status');
        $searchTerm = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Truy vấn dữ liệu từ bảng orders
        $orders = Order::when($order_status && $order_status !== 'all', function ($query) use ($order_status) {
                $query->where('order_status', $order_status);
            })
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where('username', 'like', "%{$searchTerm}%")
                      ->orWhere('email', 'like', "%{$searchTerm}%")
                      ->orWhere('phone', 'like', "%{$searchTerm}%");
            })
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                // Đảm bảo rằng startDate và endDate được chuyển đổi về định dạng ngày đúng cách
                $startDate = Carbon::parse($startDate)->startOfDay();
                $endDate = Carbon::parse($endDate)->endOfDay();
                $query->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->paginate(10);

        return view('admin.pages.orders.index', compact('orders'));
    }
  



    public function updateDeliveryStatus(Request $request)
{
    $order = Order::findOrFail((int)$request->order_id);

    // Kiểm tra trạng thái hiện tại của đơn hàng
    if ($order->order_status == 'cancel' || $order->order_status == 'success') {
        // Trả về lỗi nếu trạng thái đã bị hủy hoặc đã giao thành công
        return response()->json([
            'success' => false,
            'message' => 'Không thể cập nhật trạng thái của đơn hàng đã bị hủy hoặc đã giao thành công.'
        ]);
    }

    // Cập nhật trạng thái vận chuyển
    $order->shipment_status = $request->status;

    // Xác định thông điệp trạng thái
    $statusMessage = '';
    switch ($request->status) {
        case 'ORDERPLACE':
            $statusMessage = 'đã được tạo';
            break;
        case 'PACKED':
            $statusMessage = 'đã nhận và đang đang xử lí';
            break;
        case 'SHIPPED':
            $statusMessage = 'đã được vận chuyển';
            break;
        case 'INTRANSIT':
            $statusMessage = 'đang trên đường đến điểm đến';
            break;
        case 'OUTFORDELIVERY':
            $statusMessage = 'đã được giao cho người nhận';
            break;
        case 'DELAYED':
            $statusMessage = 'đã bị trễ hẹn trong quá trình vận chuyển';
            break;
        case 'DELIVERED':
            $statusMessage = 'đã được giao hàng thành công';
            break;
        case 'CANCEL':
            $statusMessage = 'đơn hàng đã bị hủy';
            break;
        default:
            $statusMessage = 'trạng thái không xác định';
            break;
    }

    // Lưu thông tin cập nhật trạng thái
    OrderUpdate::create([
        'order_id' => $order->id,
        'user_id' => auth()->user()->id,
        'note' => 'Đơn hàng ' . $statusMessage . '.',
    ]);
    

    Notification::create([
        'user_id' => $order->user_id,
        'type' => 'shipping_update',
        'data' => json_encode([
            'order_id' => $order->id,
            'message' => 'Trạng thái đơn hàng '.$order->id.' đã được cập nhật là :' . $statusMessage . '.',
        ]),
        'is_read' => false,
    ]);
    // Gửi thông báo cho người dùng
    ClientsNotification::create([
        'user_id' => $order->user_id,
        'type' => 'shipping_update',
        'data' => json_encode([
            'order_id' => $order->id,
            'message' => 'Đơn hàng của bạn ' . $statusMessage . '.',
        ]),
        'is_read' => false,
    ]);

    // Cập nhật trạng thái đơn hàng
    if ($request->status == "CANCEL") {
        $order->order_status = "cancel";
    } else if ($request->status == "DELIVERED") {
        $order->order_status = "success";
    }

    $order->save();

    return response()->json([
        'success' => true,
        'message' => 'Trạng thái vận chuyển đã được cập nhật thành công.'
    ]);
}


 
    



    public function downloadInvoice($id)
{
    $font_family = "'Roboto','sans-serif'";
    $order = Order::with('orderDetails.product', 'orderDetails.color', 'orderDetails.size')
    ->findOrFail($id);

    return Pdf::loadView('admin.pages.orders.downloadInvoice', [
        'order' => $order,
        'font_family' => $font_family,
        'direction' => 'ltr',
        'default_text_align' => 'left',
        'reverse_text_align' => 'right'
    ], [], [])->download('INV' . $order->id . '.pdf');
}

}
