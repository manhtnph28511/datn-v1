<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;//thư viện quản lí ngày giờ

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
}
