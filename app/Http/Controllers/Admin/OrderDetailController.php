<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();
        $search = $request->input('search');
        $status = $request->input('status');

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $orderDetails = OrderDetail::with('order', 'product', 'size', 'color')
            ->when($search, function ($query, $search) {
                $query->whereHas('order', function ($q) use ($search) {
                    $q->where('username', 'like', "%{$search}%");
                });
            })
            ->when($status && $status !== 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->paginate(10);
    
        return view('admin.pages.orderdetails.index', compact('orderDetails'));
    }    public function show($id)
    {
        $orderDetails = OrderDetail::with('order', 'product', 'size', 'color')
            ->where('order_id', $id)
            ->get(); // Sử dụng get() thay vì paginate()
    
        return view('admin.pages.orderdetails.show', compact('orderDetails'));
    }
    
    

   
   
}
