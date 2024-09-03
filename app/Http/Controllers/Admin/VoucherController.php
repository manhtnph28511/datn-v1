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
        'quantity' => 'required|int|min:0', 
        'usage_count' => 'required|int|min:0', 
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
    $validated=$request->validate([
        'code' => 'required|string',
        'discount' => 'required|numeric',
        'discount_type' => 'required|string|in:percentage,fixed',
        'starts_at' => 'required|date',
        'expires_at' => 'required|date',
        'product_id' => 'nullable|exists:products,id',
        'quantity' => 'required|int|min:0', 
        'usage_count' => 'required|int|min:0', 
    ]);

    $validated['quantity'] = max(0, $validated['quantity']);

    $voucher->update($validated);

    $voucher->code = $validated['code'];
    $voucher->discount = $validated['discount'];
    $voucher->discount_type = $validated['discount_type'];
    $voucher->starts_at = $validated['starts_at'];
    $voucher->expires_at = $validated['expires_at'];
    $voucher->product_id = $validated['product_id'];
    $voucher->quantity = $validated['quantity']; 
    $voucher->usage_count = $validated['usage_count']; 
    $voucher->save();

    return redirect()->route('admin.vouchers.index')->with('success', 'Cập nhật thành công.');
}

public function destroy(Voucher $voucher,$id)
{
    $voucher = Voucher::findOrFail($id);
    $voucher->delete();
    return redirect()->route('admin.vouchers.index')->with('success', 'Voucher deleted successfully.');
}
}
