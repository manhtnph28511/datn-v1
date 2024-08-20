<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('admin.pages.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        $products = Product::all();
        
        return view('admin.pages.vouchers.create', compact('products'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'code' => 'required|string|unique:vouchers,code',
        'discount' => 'required|int',
        'discount_type' => 'required|in:percentage,fixed',
        'starts_at' => 'required|date',
        'expires_at' => 'required|date',
        'product_id' => 'nullable|exists:products,id',
        'quantity' => 'required|int|min:0', // Số lượng còn lại
        'usage_count' => 'required|int|min:0', // Số lần đã sử dụng
    ]);

    Voucher::create($validated);

    return redirect()->route('admin.vouchers.index')->with('success', 'Voucher created successfully.');
}
    

public function edit(Voucher $voucher, $id)
{
    $voucher = Voucher::findOrFail($id);
    $products = Product::all();
    return view('admin.pages.vouchers.edit', compact('voucher', 'products'));
}


public function update(Request $request, Voucher $voucher, $id)
{
    $voucher = Voucher::findOrFail($id);
    $request->validate([
        'code' => 'required|string',
        'discount' => 'required|numeric',
        'discount_type' => 'required|string|in:percentage,fixed',
        'starts_at' => 'required|date',
        'expires_at' => 'required|date',
        'product_id' => 'nullable|exists:products,id',
        'quantity' => 'required|int|min:0', // Cập nhật số lượng
        'usage_count' => 'required|int|min:0', // Cập nhật số lần sử dụng
    ]);

    $voucher->code = $request->code;
    $voucher->discount = $request->discount;
    $voucher->discount_type = $request->discount_type;
    $voucher->starts_at = $request->starts_at;
    $voucher->expires_at = $request->expires_at;
    $voucher->product_id = $request->product_id;
    $voucher->quantity = $request->quantity; // Cập nhật số lượng
    $voucher->usage_count = $request->usage_count; // Cập nhật số lần sử dụng
    $voucher->save();

    return redirect()->route('admin.vouchers.index')->with('success', 'Voucher updated successfully.');
}

public function destroy(Voucher $voucher,$id)
{
    $voucher = Voucher::findOrFail($id);
    $voucher->delete();
    return redirect()->route('admin.vouchers.index')->with('success', 'Voucher deleted successfully.');
}
}
