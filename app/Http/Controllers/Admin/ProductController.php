<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\StatusProduct;
use App\Models\SubCategory;
Use App\Models\Category;
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


    public function show($id)
    {
        $product = Product::with(['subCate','brand', 'color', 'size', 'statusProduct'])->findOrFail($id);
        return view('admin.pages.products.show', compact('product'));
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
                    'upload_preset' => 'mwsports',  
                    'folder' => 'MWSPORT/Products',  
                    'overwrite' => true,
                    'resource_type' => 'image',
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
                    'upload_preset' => 'mwsports',  // Tên của Upload Preset
                    'folder' => 'MWSPORT/Products',  // Thư mục để lưu ảnh
                    'overwrite' => true,
                    'resource_type' => 'image',
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


    public function destroy($id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->route('admin.product.index')->with('error', 'Sản phẩm không tồn tại');
    }

    
    $product->productVariants()->delete();  

    
    $isSuccess = $product->forceDelete();

    return redirect()->route('admin.product.index')->with('success', 'Xóa thành công');
}


    



    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->paginate(10);

        return view('admin.pages.products.index', compact('products'));
    }
}
