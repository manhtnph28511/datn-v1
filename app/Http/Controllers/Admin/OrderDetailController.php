<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\OrderExport;
use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderDetailController extends Controller
{
    public function index(Request $request)
    {
        $query = OrderDetail::with('order', 'product', 'size', 'color');
    
        $search = $request->input('search');
        $orderId = $request->input('order_id');
        $status = $request->input('status');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Lọc theo ngày nếu có
        if ($startDate && $endDate) {
            $query->whereBetween('order_details.created_at', [$startDate, $endDate]);
        }
    
        // Tìm kiếm theo tên người đặt
        $query->when($search, function ($query, $search) {
            $query->whereHas('order', function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%");
            });
        });
    
        // Tìm kiếm theo ID đơn hàng
        $query->when($orderId, function ($query, $orderId) {
            $query->where('order_id', $orderId);
        });
    
        // Lọc theo trạng thái đơn hàng
        $query->when($status && $status !== 'all', function ($query) use ($status) {
            $query->whereHas('order', function ($q) use ($status) {
                $q->where('order_status', $status);
            });
        });
    
        $orderDetails = $query->orderBy('order_details.created_at', 'desc')->paginate(10);
    
        return view('admin.pages.orderdetails.index', compact('orderDetails'));
    }
    


    

    public function show($id)
    {
        $orderDetails = OrderDetail::with('order', 'product', 'size', 'color')
            ->where('order_id', $id)
            ->get(); // Sử dụng get() thay vì paginate()
    
        return view('admin.pages.orderdetails.show', compact('orderDetails'));
    }


    public function exportStatistics(Request $request)
    {

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

    $orders = Order::with('orderDetails')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->get();

        // Gọi export và truyền dữ liệu vào
        return Excel::download(new OrderExport($orders), 'order_statistics.xlsx');
    }
    
    

   
   
}
