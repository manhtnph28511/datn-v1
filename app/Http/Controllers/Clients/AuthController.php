<?php

// namespace App\Http\Controllers\Clients;

// use App\Http\Controllers\Controller;
// use App\Models\User;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\Clients\Auth\AuthRequest;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\NotifyMail;

// class AuthController extends Controller
// {

//     public function showLoginForm()
//     {
//         return view('clients.pages.auth.login');
//     }
//     // public function login(AuthRequest $request)
//     // {
//     //     if ($request->getMethod() === 'POST') {
//     //         $credentials = $request->only('email', 'password');
//     //         if (Auth::attempt($credentials)) {
//     //             if (Auth::user()->role === 1) {
//     //                 toast('Đăng nhập thành công!', 'success');
//     //                 return redirect()->route('admin');
//     //             }
//     //             toast('Đăng nhập thành công!', 'success');
//     //             return redirect()->route('home-client');
//     //         }
//     //         toast('Đăng nhập không thành công', 'info');
//     //         return back();
//     //     }
//     //     return view('clients.pages.auth.login');
//     // }
//     public function login(AuthRequest $request)
// {
//     // Chỉ xử lý yêu cầu POST
//     if ($request->isMethod('post')) {
//         $credentials = $request->only('email', 'password');
        
//         if (Auth::attempt($credentials)) {
//             // Đăng nhập thành công
//             $user = Auth::user();
            
//             // Kiểm tra vai trò của người dùng
//             if ($user->role === 1) {
//                 // Đăng nhập thành công với vai trò admin
//                 toast('Đăng nhập thành công với quyền admin!', 'success');
//                 return redirect()->route('admin');
//             }
            
//             // Đăng nhập thành công với vai trò user
//             toast('Đăng nhập thành công!', 'success');
//             return redirect()->route('home-client');
//         }

//         // Đăng nhập không thành công
//         toast('Thông tin đăng nhập không chính xác.', 'error');
//         return back()->withInput();
//     }
    
//     // Hiển thị trang đăng nhập
//     return view('clients.pages.auth.login');
// }



//     public function register(AuthRequest $request)
//     {
//         if ($request->getMethod() === 'POST') {
//             $credentials = User::create([
//                 'name' => $request->name,
//                 'email' => $request->email,
//                 'password' => Hash::make($request->password),
//             ]);
    
//             if ($credentials) {
//                 $emailRegister = $request->email;
//                 Mail::to($emailRegister)->send(new NotifyMail());
//                 toast('Đăng ký tài khoản thành công', 'success');
//                 return view('clients.pages.auth.login'); // Trả về view đăng nhập
//             }
    
//             toast('Đăng ký không thành công, vui lòng thử lại', 'warning');
//             return back();
//         }
    
//         return view('clients.pages.auth.register');
//     }
    

//     // public function logout()
//     // {
//     //     Auth::logout();
//     //     toast('Logout successfully', 'success');
//     //     return redirect()->route('account.login');
//     // }
    
//     public function logout()
// {
//     Auth::logout();
//     request()->session()->invalidate();
//     request()->session()->regenerateToken();
//     toast('Logout successfully', 'success');
//     return redirect()->route('account.login');
// }
// }

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Clients\Auth\AuthRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Mail\ResetPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('clients.pages.auth.login');
    }
    public function login(AuthRequest $request)
    {
        if ($request->getMethod() === 'POST') {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                if (Auth::user()->role === 1) {
                    toast('Đăng nhập thành công!', 'success');
                    return redirect()->route('admin');
                }
                toast('Đăng nhập thành công!', 'success');
                return redirect()->route('home-client');
            }
            toast('Đăng nhập không thành công', 'info');
            return back();
        }
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
    public function forgot(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('home-client'));
        }
        if ($request->getMethod() === 'POST') {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
            ], [
                'email.required' => 'Email là bắt buộc.',
                'email.email' => 'Email không hợp lệ.',
                'email.exists' => 'Email này không tồn tại trong hệ thống.',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $email = $request->input('email');
            $user = User::where('email', $email)->first();
            if (!$user || empty($user)) {
                toast('Tài khoản này không tồn tại', 'warning');
                return back();
            }
            if ($user) {
                $password_reset_tokens =  DB::table('password_reset_tokens')->where('email', $user->email);
                if ($password_reset_tokens->exists()) {
                    $password_reset_tokens->delete();
                }
                $key = Config::get('app.key');
                $token = Str::random(16);
                $encryptedToken = encrypt($token, $key);
                DB::table('password_reset_tokens')->insert([
                    'email' => $user->email,
                    'token' =>  $encryptedToken,
                    'created_at' => Carbon::now()
                ]);
                $resetLink = url(config('app.url') . route('account.password.reset', ['token' => $encryptedToken, 'email' => $user->email], false));
                $mail = Mail::to($user->email)->send(new ResetPassword($resetLink));
            }
            try {
                Mail::to($user->email)->send(new ResetPassword($resetLink));
                session()->flash('success', 'Đã gửi mail khôi phục mật khẩu thành công');
            } catch (\Exception $e) {
                session()->flash('error', 'Có lỗi xảy ra trong quá trình gửi email. Vui lòng thử lại!');
            }
        }
        return view('clients.pages.auth.forgotpassword');
    }
    public function reset(Request $request)
    {
        if ($request->getMethod() === 'POST') {
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:3',
                'password_confirm' => 'required|same:password|min:3'
            ], [
                'password.required' => 'Mật khẩu là bắt buộc.',
                'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự.',
                'password_confirm.required' => 'Bạn cần nhập lại mật khẩu.',
                'password_confirm.same' => 'Mật khẩu nhập lại không khớp.',
                'password_confirm.min' => 'Mật khẩu nhập lại phải có ít nhất 3 ký tự.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $email = session('reset_email');
            $token = session('reset_token');
            $check = DB::table('password_reset_tokens')->where('email', $email)->first();
            if ($check && $token) {
                if ($check->token === $token) {
                    $createdAt = Carbon::parse($check->created_at);
                    $expiresAt = $createdAt->addMinutes(60);
                    $currentTime = now();
                    if ($currentTime->lte($expiresAt)) {
                        $user = User::where('email', $email)->first();
                        if ($user) {
                            $user->password = Hash::make($request->password);
                            $user->save();
                            DB::table('password_reset_tokens')->where('email', $email)->delete();
                            session()->forget('reset_email');
                            session()->forget('reset_token');
                            toast('Thay đổi mật khẩu thành công', 'success');
                            return redirect()->route('account.login');
                        }
                    }
                }
            }
            abort(404);
        }
        $check = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        $status = false;
        if ($check && $request->token) {
            if ($check->token === $request->token) {

                $createdAt = Carbon::parse($check->created_at);
                $expiresAt = $createdAt->addMinutes(60);
                $currentTime = now();
                if ($currentTime->lte($expiresAt)) {
                    $status = true;
                    session(['reset_email' => $check->email, 'reset_token' => $check->token]);
                } else {
                    $status = false;
                }
            }
        }
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('clients.pages.auth.resetpassword', compact('status'));
    }

    public function logout()
    {
        Auth::logout();
        toast('Logout successfully', 'success');
        return redirect()->route('account.login');
    }
}
