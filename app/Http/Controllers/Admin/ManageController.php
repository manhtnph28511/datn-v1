<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManageController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $manages = User::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('email', 'LIKE', "%{$query}%")
                            ->get();
        } else {
            $manages = User::get();
        }
        return view('admin.pages.manages.index', compact('manages'));
    }

   
    public function create()
    {
        return view('admin.pages.manages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        // Xử lý và lưu dữ liệu
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role = 1; // Mặc định là quản trị viên
        $user->save();
       
        return redirect()->route('admin.manage.index')->with('success', 'Quản trị viên mới đã được tạo thành công.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manage.index')->with('success', 'Xóa tài khoản thành công');
    }
  
    public function search(Request $request)
    {
        $query = $request->input('query');
        $manages = User::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('email', 'LIKE', "%{$query}%")
                        ->get();

        return view('admin.pages.manages.index', compact('manages'));
    }

    public function trashed()
{
    $trashedUsers = User::onlyTrashed()->get(); // Lấy danh sách các tài khoản đã bị xóa
    return view('admin.pages.manages.trashed', compact('trashedUsers'));
}

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore(); // Khôi phục tài khoản
        return redirect()->route('admin.manage.trashed')->with('success', 'Khôi phục tài khoản thành công');
    }
   

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.manages.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
  
        if (!$request->has('role')) {
            $user->role = 1;
        } else {
            $user->role = $request->role;
        }

      
        // $user->role = $request->role; // Hoặc các trường khác nếu cần
        $user->save();

        return redirect()->route('admin.manage.index')->with('success', 'Thông tin quản trị viên đã được cập nhật thành công.');
    }
}
