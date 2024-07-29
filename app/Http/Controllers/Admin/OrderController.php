<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $query = $request->input('query');

        // Tìm kiếm và phân trang
        $orders = Order::where('username', 'like', "%{$query}%")->paginate(10);

        return view('admin.pages.orders.index', compact('orders'));
    }
}
