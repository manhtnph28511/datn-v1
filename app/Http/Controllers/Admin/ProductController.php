<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\StatusProduct;
use App\Models\SubCategory;
use App\Models\ProductVariant;
use Alert;
use App\Http\Requests\Admin\ProductRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private const PATH_UPLOAD = 'admin/products';

    public function index()
    {
        $products = Product::latest()
        ->with(['color', 'size']) 
        ->paginate(6);
        return view('admin.pages.products.index', compact('products'));
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->paginate(6);
        return view('admin.pages.products.trash-list', compact('products'));
    }

    public function restore($id)
    {
        $isSuccess = Product::onlyTrashed()->whereId($id)->restore();
        return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Hoàn tác thành công', 'admin.product.index');
    }

    public function store(ProductRequest $request)
    {
        $brands = Brand::all();
        $cates = SubCategory::all();
        $colors = Color::all();
        $sizes = Size::all();
        $sttProduct = StatusProduct::all();
        if ($request->method() === 'POST') {

            $data = $request->except('image');
            $data['slug'] = Str::slug($request->get('name'));
            if($request->hasFile('image')) {
                $data['image'] = Cloudinary::upload($request->file('image')->getRealPath(),array(
                    'folder' => 'Cara/Products',
                    'overwrite' => TRUE,
                    'resource_type' => 'image'
                ))->getSecurePath();
            }
            $isSuccess = Product::create($data);
            if(!$isSuccess) {
                $publicId = $this->getPublicId($data['image']);
                Cloudinary::destroy($publicId);
            }
            return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Thêm mới thành công', 'admin.product.index');
        }
        return view('admin.pages.products.create-form', [
            'brands' => $brands,
            'cates' => $cates,
            'colors' => $colors,
            'sizes' => $sizes,
            'sttProduct' => $sttProduct
        ]);
    }
    
    // public function store(ProductRequest $request)
    // {
    //     // Lấy danh sách các tùy chọn cho form
    //     $brands = Brand::all();
    //     $cates = SubCategory::all();
    //     $colors = Color::all();
    //     $sizes = Size::all();
    //     $sttProduct = StatusProduct::all();
        
    //     if ($request->method() === 'POST') {
    
    //         // Lấy dữ liệu từ request
    //         $data = $request->except('image', 'variant_product_id', 'image_variant', 'color_id', 'size_id', 'price_variant');
    //         $data['slug'] = Str::slug($request->get('name'));
    
    //         // Xử lý hình ảnh sản phẩm
    //         if($request->hasFile('image')) {
    //             $data['image'] = Cloudinary::upload($request->file('image')->getRealPath(), array(
    //                 'folder' => 'Cara/Products',
    //                 'overwrite' => TRUE,
    //                 'resource_type' => 'image'
    //             ))->getSecurePath();
    //         }
    
    //         // Tạo sản phẩm
    //         $product = Product::create($data);
    
    //         if ($product) {
    //             // Xử lý các biến thể sản phẩm
    //             if ($request->has('variant_product_id')) {
    //                 foreach ($request->input('variant_product_id') as $index => $variantProductId) {
    //                     if ($variantProductId) {
    //                         $variantImagePath = null;
    //                         if ($request->hasFile('image_variant.' . $index)) {
    //                             $imageVariant = $request->file('image_variant.' . $index);
    //                             $variantImagePath = Cloudinary::upload($imageVariant->getRealPath(), array(
    //                                 'folder' => 'Cara/ProductVariants',
    //                                 'overwrite' => TRUE,
    //                                 'resource_type' => 'image'
    //                             ))->getSecurePath();
    //                         }
    
    //                         ProductVariant::create([
    //                             'product_id' => $product->id,
    //                             'variant_product_id' => $variantProductId,
    //                             'image_variant' => $variantImagePath,
    //                             'color_id' => $request->input('color_id.' . $index),
    //                             'size_id' => $request->input('size_id.' . $index),
    //                             'price' => $request->input('price_variant.' . $index),
    //                         ]);
    //                     }
    //                 }
    //             }
    //         } else {
    //             // Xóa hình ảnh nếu không tạo được sản phẩm
    //             if ($data['image']) {
    //                 $publicId = $this->getPublicId($data['image']);
    //                 Cloudinary::destroy($publicId);
    //             }
    //         }
    
    //         // Hiển thị thông báo thành công hoặc thất bại
    //         return checkEndDisplayMsg('success', 'Thành công', 'Thêm mới thành công', 'admin.product.index');
    //     }
    
    //     // Trả về view để thêm sản phẩm mới
    //     return view('admin.pages.products.create-form', [
    //         'brands' => $brands,
    //         'cates' => $cates,
    //         'colors' => $colors,
    //         'sizes' => $sizes,
    //         'sttProduct' => $sttProduct
    //     ]);
    // }
    
    



    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $colors = Color::all();
        $sizes = Size::all();
        $cates = SubCategory::all();
        $brands = Brand::all();
        $sttProduct = StatusProduct::all();
        if ($request->method() === 'POST') {

            $data = $request->except(['_token','image']);

            if($request->hasFile('image')) {
                $data['image'] = $data['image'] = Cloudinary::upload($request->file('image')->getRealPath(),array(
                    'folder' => 'Cara/Products',
                    'overwrite' => TRUE,
                    'resource_type' => 'image'
                ))->getSecurePath();
            }

            $isSuccess = Product::where('id', $id)->update($data);

            if(!$isSuccess) {
                $publicId = $this->getPublicId($data['image']);
                Cloudinary::destroy($publicId);
            }

            return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Cập nhật thành công', 'admin.product.index');
        }
        return view('admin.pages.products.edit-form', compact('product', 'colors', 'sizes', 'cates', 'brands', 'sttProduct'));
    }

    public function softDelete($id)
    {
        $isSuccess = Product::destroy($id);
        return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Xóa thành công', 'admin.product.index');
    }

    public function destroy($id)
    {
//        $product = Product::onlyTrashed()->where('id',$id)->first();
        $isSuccess = Product::where('id',$id)->forceDelete();
        return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Xóa thành công', 'admin.product.index');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->paginate(10);

        return view('admin.pages.products.index', compact('products'));
    }
}
