<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\Product;
use App\Models\Color;
use App\Http\Requests\Admin\StoreProductVariantRequest;
use App\Models\Size;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
    public function store(StoreProductVariantRequest $request, $product_id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($product_id);
    
        // Tạo và lưu biến thể mới
        $variant = new ProductVariant();
        $variant->product_id = $product_id;
        $variant->size_id = $request->size_id;
        $variant->color_id = $request->color_id;
        $variant->price = $request->price;
        $variant->quantity = $request->quantity;
    
        // Xử lý ảnh nếu có
        if ($request->hasFile('image_variant')) {
            $uploadedImage = Cloudinary::upload($request->file('image_variant')->getRealPath(), [
                'folder' => 'Cara/Products',
                'overwrite' => true,
                'resource_type' => 'image'
            ])->getSecurePath();
            $variant->image_variant = $uploadedImage;
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

    public function update(StoreProductVariantRequest $request, $product_id, $variant_id)
{
    // Tìm sản phẩm và biến thể
    $product = Product::findOrFail($product_id);
    $variant = ProductVariant::findOrFail($variant_id);

    // Lấy dữ liệu từ request
    $data = $request->except(['_token', 'image_variant']);

    // Xử lý hình ảnh nếu có
    if ($request->hasFile('image_variant')) {
        // Xóa hình ảnh cũ nếu có
        if ($variant->image_variant) {
            $publicId = $this->getPublicId($variant->image_variant);
            Cloudinary::destroy($publicId);
        }

        // Tải lên hình ảnh mới
        $data['image_variant'] = Cloudinary::upload($request->file('image_variant')->getRealPath(), [
            'folder' => 'Cara/Products/Variants',
            'overwrite' => true,
            'resource_type' => 'image'
        ])->getSecurePath();
    }

    // Cập nhật biến thể
    $isSuccess = $variant->update($data);

    // Kiểm tra thành công và thông báo
    if ($isSuccess) {
        return redirect()->route('admin.variant.index', ['product_id' => $product_id])
            ->with('success', 'Biến thể đã được cập nhật thành công.');
    } else {
        // Xóa hình ảnh mới tải lên nếu không thành công
        if (isset($data['image_variant'])) {
            $publicId = $this->getPublicId($data['image_variant']);
            Cloudinary::destroy($publicId);
        }

        return redirect()->back()->with('error', 'Cập nhật biến thể không thành công.');
    }
}




    public function destroy($id)
    {
        $variant = ProductVariant::findOrFail($id);
        $variant->delete();

        return back()->with('success', 'Biến thể sản phẩm đã được xóa thành công.');
    }
}
