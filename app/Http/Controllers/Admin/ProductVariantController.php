<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;

class ProductVariantController extends Controller
{
    public function index($product_id)
    {
        $product = Product::findOrFail($product_id);
        $variants = ProductVariant::where('product_id', $product_id)->get();
        return view('admin.pages.variants.index', compact('product', 'variants'));
    }
    

    public function create($product_id)
    {

    $product = Product::findOrFail($product_id);
    $sizes = Size::all(); // Thay thế Size bằng tên model của bạn
    $colors = Color::all(); // Thay thế Color bằng tên model của bạn
    return view('admin.pages.variants.create', compact('product','sizes','colors','product_id'));

    }
    public function store(Request $request, $product_id)
    {
        // Xác thực dữ liệu từ request
        $request->validate([
            'size_id' => 'required|exists:sizes,id',   // Thay đổi để xác thực theo size_id
            'color_id' => 'required|exists:colors,id', // Thay đổi để xác thực theo color_id
            'price' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',
        ]);
    
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($product_id);
    

        // Tạo và lưu biến thể mới
        $variant = new ProductVariant();
        $variant->product_id = $product_id;
        $variant->size_id = $request->size_id;
        $variant->color_id = $request->color_id;
        $variant->price = $request->price;
        $variant->quantity = $request->quantity;
        if ($request->hasFile('image_variant')) {
            $image = $request->file('image_variant');
            $imagePath = $image->store('images/product_variants', 'public');
            $variant->image_variant= $imagePath;
        }
        $variant->save();
    
        // Chuyển hướng về trang tạo với thông báo thành công
        return redirect()->route('admin.variant.index', $product_id)
            ->with('success', 'Biến thể đã được thêm thành công.');
    }
    
    public function edit($product_id, $variant_id)
    {
        $variant = ProductVariant::where('id', $variant_id)
                                ->where('product_id', $product_id)
                                ->firstOrFail();
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.pages.variants.edit', compact('variant', 'products', 'colors', 'sizes','product_id'));
    }

    public function update(Request $request, $product_id, $variant_id)
{
    // Xác thực dữ liệu từ request
    $request->validate([
        'size_id' => 'required|exists:sizes,id',
        'color_id' => 'required|exists:colors,id',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
    ]);

    // Tìm biến thể theo ID
    $variant = ProductVariant::findOrFail($variant_id);

    // Cập nhật thông tin biến thể
    $variant->size_id = $request->size_id;
    $variant->color_id = $request->color_id;
    $variant->price = $request->price;
    $variant->quantity = $request->quantity;

    // Xử lý hình ảnh nếu có
    if ($request->hasFile('image_variant')) {
        $image = $request->file('image_variant');
        $imagePath = $image->store('images/product_variants', 'public');
        $variant->image_variant = $imagePath;
    }

    // Lưu biến thể
    $variant->save();

    // Chuyển hướng với thông báo thành công
    return redirect()->route('admin.variant.index', ['product_id' => $product_id])
    ->with('success', 'Biến thể đã được thêm thành công.');
}


    public function destroy($id)
    {
        $variant = ProductVariant::findOrFail($id);
        $variant->delete();

        return back()->with('success', 'Biến thể sản phẩm đã được xóa thành công.');
    }
}
