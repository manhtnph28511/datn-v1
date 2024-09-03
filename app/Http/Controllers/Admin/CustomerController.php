<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ClientsNotification;
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


        ClientsNotification::create([
            'user_id'=>$user->id,
            'type' => 'account_update',
            'data' => json_encode([
                'user_id' => $user->id,
                'message' => 'Chúng tôi đã mở lại tài khoản của bạn',
            ]),
            'is_read' => false,
        ]);
    
        // Tạo thông báo cho admin về việc khóa tài khoản người dùng
        Notification::create([
            'type' => 'account_update',
            'data' => json_encode([
                'user_id' => auth()->user()->id,
                'message' => 'Bạn đã mở khóa tài khoản người dùng với ID: ' . $user->id,
            ]),
            'is_read' => false,
        ]);

        return redirect()->route('admin.customer.index')->with('success', 'Người dùng đã được kích hoạt.');
    }

    public function deactivate($id) {
        $user = User::findOrFail($id);
        $user->status = 0; // Giả sử 0 là trạng thái inactive
        $user->save();
    
        // Tạo thông báo cho người dùng bị khóa tài khoản
        ClientsNotification::create([
            'user_id'=>$user->id,
            'type' => 'account_update',
            'data' => json_encode([
                'user_id' => $user->id,
                'message' => 'Chúng tôi đã nhận thấy 1 số hành động lại từ tài khoản của bạn nên đã tạm thời khóa nó . Vui lòng liên hệ qua trang chat',
            ]),
            'is_read' => false,
        ]);
    
        // Tạo thông báo cho admin về việc khóa tài khoản người dùng
        Notification::create([
            'type' => 'account_update',
            'data' => json_encode([
                'user_id' => auth()->user()->id,
                'message' => 'Bạn đã khóa tài khoản người dùng với ID: ' . $user->id,
            ]),
            'is_read' => false,
        ]);
    
        return redirect()->route('admin.customer.index')->with('success', 'Người dùng đã bị hủy kích hoạt.');
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
