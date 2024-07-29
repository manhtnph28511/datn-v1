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
        $search = $request->input('search');
        $status = $request->input('status');
        
        $orderDetails = OrderDetail::with('order', 'product', 'size', 'color')
            ->when($search, function ($query, $search) {
                $query->whereHas('order', function ($q) use ($search) {
                    $q->where('username', 'like', "%{$search}%");
                });
            })
            ->when($status && $status !== 'all', function ($query) use ($status) {
                $query->where('type', $status);
            })
            ->paginate(10);
    
        return view('admin.pages.orderdetails.index', compact('orderDetails'));
    }
    public function show($id)
    {
        $orderDetail = OrderDetail::with('order', 'product', 'size', 'color')->findOrFail($id);
        return view('admin.pages.orderdetails.show', compact('orderDetail'));
    }


    public function updateType(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string',
        ]);

        $orderDetail = OrderDetail::findOrFail($id);

        // Kiểm tra nếu trạng thái hiện tại là "đã hủy" hoặc "hoàn thành"
        if ($orderDetail->type === 'đã hủy' || $orderDetail->type === 'hoàn thành') {
            return redirect()->route('admin.orderdetail.index')->with('error', 'Không thể cập nhật trạng thái khi đơn hàng đã bị hủy hoặc hoàn thành.');
        }

        $orderDetail->type = $request->type;
        $orderDetail->save();

        if (in_array($orderDetail->type, ['đã hủy', 'hoàn thành'])) {
            $orderDetail->order->update(['note' => $orderDetail->type]);
        }


        return redirect()->route('admin.orderdetail.index')->with('success', 'Trạng thái đơn hàng đã được cập nhật thành công.');
    }

   
}
