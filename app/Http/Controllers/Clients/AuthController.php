<?php



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
                // Lưu lại thông tin người dùng vào session
                $user = Auth::user();
                session()->put('user_role', $user->role);
                
                if ($user->role === 1) {
                    toast('Đăng nhập thành công!', 'success');
                    return redirect()->route('admin.dashboard');
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


    public function forgotPassword(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $user = User::where('name', $request->name)
                    ->where('email', $request->email)
                    ->first();

        if ($user) {
            return view('clients.pages.auth.resetpassword', ['user_id' => $user->id]);
        } else {
            return redirect()->back()->withErrors(['email' => 'Thông tin không chính xác. Vui lòng thử lại.']);
        }
    }


    public function showPassword(Request $request)
{
    $user_id = $request->query('user_id', old('user_id'));

    return view('clients.pages.auth.resetpassword', [
        'user_id' => $user_id,
    ]);
}

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('account.password.show')
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = User::find($request->user_id);

        if (!$user) {
            return redirect()->route('account.password.show')
                             ->withErrors(['user_id' => 'Người dùng không tồn tại.'])
                             ->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('account.login')
                         ->with('success', 'Cập nhật mật khẩu thành công');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        toast('Logout successfully', 'success');
        return redirect()->route('account.login');
    }
}
