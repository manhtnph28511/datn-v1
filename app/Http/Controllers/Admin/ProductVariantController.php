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
    $sizes = Size::all(); 
    $colors = Color::all(); 
    return view('admin.pages.variants.create', compact('product','sizes','colors','product_id'));

    }
    public function store(StoreProductVariantRequest $request, $product_id)
    {
       
        $product = Product::findOrFail($product_id);
    
        
        $variant = new ProductVariant();
        $variant->product_id = $product_id;
        $variant->size_id = $request->size_id;
        $variant->color_id = $request->color_id;
        $variant->price = $request->price;
        $variant->quantity = $request->quantity;
    
      
        if ($request->hasFile('image_variant')) {
            $uploadedImage = Cloudinary::upload($request->file('image_variant')->getRealPath(), [
                'upload_preset' => 'mwsports',  
                'folder' => 'MWSPORT/Products', 
                'overwrite' => true,
                'resource_type' => 'image',
            ])->getSecurePath();
            $variant->image_variant = $uploadedImage;
        }
    
        $variant->save();
    
       
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
   
    $product = Product::findOrFail($product_id);
    $variant = ProductVariant::findOrFail($variant_id);

   
    $data = $request->except(['_token', 'image_variant']);

   
    if ($request->hasFile('image_variant')) {
       
        if ($variant->image_variant) {
            $publicId = $this->getPublicId($variant->image_variant);
            Cloudinary::destroy($publicId);
        }
 
        $data['image_variant'] = Cloudinary::upload($request->file('image_variant')->getRealPath(), [
            'upload_preset' => 'mwsports',  
            'folder' => 'MWSPORT/Products',  
            'overwrite' => true,
            'resource_type' => 'image',
        ])->getSecurePath();
    }


    
    if ($variant->quantity < 0) {
        $variant->quantity = 0; 
    }
    
    
    $isSuccess = $variant->update($data);

   
    if ($isSuccess) {
        return redirect()->route('admin.variant.index', ['product_id' => $product_id])
            ->with('success', 'Biến thể đã được cập nhật thành công.');
    } else {
       
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
