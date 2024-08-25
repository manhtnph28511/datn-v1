<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Clients\Auth\AuthRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('clients.pages.auth.login');
    }
    // public function login(AuthRequest $request)
    // {
    //     if ($request->getMethod() === 'POST') {
    //         $credentials = $request->only('email', 'password');
    //         if (Auth::attempt($credentials)) {
    //             if (Auth::user()->role === 1) {
    //                 toast('Đăng nhập thành công!', 'success');
    //                 return redirect()->route('admin');
    //             }
    //             toast('Đăng nhập thành công!', 'success');
    //             return redirect()->route('home-client');
    //         }
    //         toast('Đăng nhập không thành công', 'info');
    //         return back();
    //     }
    //     return view('clients.pages.auth.login');
    // }
    public function login(AuthRequest $request)
{
    // Chỉ xử lý yêu cầu POST
    if ($request->isMethod('post')) {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            $user = Auth::user();
            
            // Kiểm tra vai trò của người dùng
            if ($user->role === 1) {
                // Đăng nhập thành công với vai trò admin
                toast('Đăng nhập thành công với quyền admin!', 'success');
                return redirect()->route('admin');
            }
            
            // Đăng nhập thành công với vai trò user
            toast('Đăng nhập thành công!', 'success');
            return redirect()->route('home-client');
        }

        // Đăng nhập không thành công
        toast('Thông tin đăng nhập không chính xác.', 'error');
        return back()->withInput();
    }
    
    // Hiển thị trang đăng nhập
    return view('clients.pages.auth.login');
}



    public function register(AuthRequest $request)
    {
        if ($request->getMethod() === 'POST') {
            $credentials = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            if ($credentials) {
                $emailRegister = $request->email;
                Mail::to($emailRegister)->send(new NotifyMail());
                toast('Đăng ký tài khoản thành công', 'success');
                return view('clients.pages.auth.login'); // Trả về view đăng nhập
            }
    
            toast('Đăng ký không thành công, vui lòng thử lại', 'warning');
            return back();
        }
    
        return view('clients.pages.auth.register');
    }
    

    // public function logout()
    // {
    //     Auth::logout();
    //     toast('Logout successfully', 'success');
    //     return redirect()->route('account.login');
    // }
    public function logout()
{
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    toast('Logout successfully', 'success');
    return redirect()->route('account.login');
}
}
