<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\User;
use App\Models\UserVoucher;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('clients.pages.vouchers.index', compact('vouchers'));
    }

    public function saveVoucher(Request $request, $voucherId, $id)
    {
        $user = User::find($id); // Tìm người dùng theo ID

        if ($user) {
        
            // Tạo bản ghi mới trong bảng user_voucher
            UserVoucher::create([
                'user_id' => $user->id,
                'voucher_id' => $voucherId,
            ]);

            return redirect()->route('clients.vouchers.index')->with('success', 'Voucher đã được lưu thành công.');
        } else {
            return redirect()->route('clients.vouchers.index')->with('error', 'Vui lòng đăng nhập để lưu voucher.');
        }
    }
}
