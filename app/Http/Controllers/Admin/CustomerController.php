<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Notification;

class CustomerController extends Controller
{
    public function index() {
        $customers = User::get();
        return view('admin.pages.customers.index',compact('customers'));
    }


    public function activate($id) {
        $user = User::findOrFail($id);
        $user->status = 1; // Giả sử 1 là trạng thái active
        $user->save();

        return redirect()->route('admin.customer.index')->with('success', 'Người dùng đã được kích hoạt.');
    }

    public function deactivate($id) {
        $user = User::findOrFail($id);
        $user->status = 0; // Giả sử 0 là trạng thái inactive
        $user->save();

        $chatUrl = route('clients.chats.index', ['userId' => $id]);

        Notification::create([
            'order_id' => null, // Nếu không sử dụng order_id, để null hoặc bỏ qua
            'type' => 'account_update',
            'data' => json_encode([
                'message' => 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ qua trang chat: <a href="' . $chatUrl . '" style="font-weight: bold; text-decoration: underline;">Đến trang chat</a>.',
            ]),
            'is_read' => false,
        ]);
        return redirect()->route('admin.customer.index')->with('success', 'Người dùng đã bị hủy kích hoạt.');
        // return redirect()->route('clients.chats.index', ['userId' => $id])
        //                  ->with('success', 'Người dùng đã bị hủy kích hoạt và thông báo đã được gửi.');
    }
    

    public function search(Request $request) {
        $query = $request->input('query');
    
        $customers = User::where(function($q) use ($query) {
            if ($query) {
                $q->where('name', 'LIKE', "%$query%")
                  ->orWhere('email', 'LIKE', "%$query%")
                  ->orWhereDate('created_at', $query);
            }
        })->get();
    
        return view('admin.pages.customers.index', compact('customers'));
    }
} 
