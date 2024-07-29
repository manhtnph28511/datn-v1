<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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
