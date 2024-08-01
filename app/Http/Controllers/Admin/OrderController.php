<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;//thư viện quản lí ngày giờ
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('admin.pages.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.pages.orders.show', compact('order'));
    }
    public function search(Request $request)
    {
        $note = $request->input('note');
        $searchTerm = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Truy vấn dữ liệu từ bảng orders
        $orders = Order::when($note && $note !== 'all', function ($query) use ($note) {
                $query->where('note', $note);
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
    public function updatePaymentStatus(Request $request)
    {
        $order = Order::findOrFail((int)$request->order_id);
        $order->order_status = $request->status;
        $order->save();
        if ($request->status == "PENDING") {
            $status = "chờ thanh toán";
        } else if ($request->status == 'PAID') {
            $status = "đã thanh toán";
        } else {
            $status = "huỷ";
        }
        OrderUpdate::create([
            'order_id' => $order->id,
            'user_id' => auth()->user()->id,
            'note' => 'Trạng thái thanh toán được cập nhật thành ' . $status . '.',
        ]);

        return true;
    }

    public function updateDeliveryStatus(Request $request)
    {
        $order = Order::findOrFail((int)$request->order_id);
        $order->shipment_status = $request->status;
        $order->save();
        if ($request->status == "ORDERPLACE") {
            $status = "đã được tạo";
        } else   if ($request->status == "PACKED") {
            $status = 'đã nhận và đang đóng gói';
        } else  if ($request->status == "SHIPPED") {
            $status = 'đã được vận chuyển';
        } else   if ($request->status == "INTRANSIT") {
            $status = 'đang trên đường đến điểm đến';
        } else   if ($request->status == "OUTFORDELIVERY") {
            $status = 'đang được giao cho người nhận';
        } else   if ($request->status == "DELIVERED") {
            $status = 'đã được giao hàng thành công';
        } else  if ($request->status == "DELAYED") {
            $status = 'đã bị trễ hẹn trong quá trình vận chuyển';
        } else  if ($request->status == "EXCEPTION") {
            $status = 'đã gặp vấn đề hoặc ngoại lệ trong quá trình vận chuyển';
        } else  if ($request->status == "RETURNED") {
            $status = 'đã được hoàn trả lại cho người gửi';
        }
        OrderUpdate::create([
            'order_id' => $order->id,
            'user_id' => auth()->user()->id,
            'note' => 'Đơn hàng ' . $status . '.',
        ]);

        return true;
    }
    public function downloadInvoice($id)
    {
        $font_family = "'Roboto','sans-serif'";
        $order = Order::findOrFail((int)$id);

        return Pdf::loadView('admin.pages.orders.downloadInvoice', [
            'order' => $order,
            'font_family' => $font_family,
            'direction' => 'ltr',
            'default_text_align' => 'left',
            'reverse_text_align' => 'right'
        ], [], [])->download('INV' . $order->id . '.pdf');
    }
}
