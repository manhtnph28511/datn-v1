<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserVoucher;
use Illuminate\Support\Facades\Auth;

class UserVoucherController extends Controller
{
    public function userVouchers()
    {
        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Lấy tất cả các voucher của người dùng
        $vouchers = UserVoucher::where('user_id', $user->id)->with('voucher')->get();

        // Trả về view với dữ liệu vouchers
        return view('clients.pages.users.voucher', compact('vouchers'));
    }
}
