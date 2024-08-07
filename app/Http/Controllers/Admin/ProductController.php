<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\StatusProduct;
use App\Models\SubCategory;
use App\Models\ProductVariation;
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
//    public function createOrStore(Request $request)
// public function Store(Request $request)
// {
//     if ($request->isMethod('post')) {
//         $data = $request->except('image', 'variants');
//         $data['slug'] = Str::slug($request->get('name'));

//         if (empty($data['name'])) {
//                       return redirect()->back()->withErrors(['name' => 'Tên sản phẩm là bắt buộc']);
//                    }
//         if ($request->hasFile('image')) {
//             $data['image'] = Cloudinary::upload($request->file('image')->getRealPath(), [
//                 'folder' => 'Cara/Products',
//                 'overwrite' => TRUE,
//                 'resource_type' => 'image'
//             ])->getSecurePath();
//         }

//         // Đảm bảo rằng color_id được cung cấp
//         $product = Product::create($data);

//         // Lưu các biến thể (nếu có)
//         $variants = $request->input('variants', []);
//         foreach ($variants as $variant) {
//             $product->variants()->create($variant);
//         }

//         return redirect()->route('admin.product.createOrStore')->with('message', 'Thêm mới sản phẩm và biến thể thành công');
//     }

//     // Hiển thị form cho GET request
//     $brands = Brand::all();
//     $cates = SubCategory::all();
//     $colors = Color::all();
//     $sizes = Size::all();
//     $sttProduct = StatusProduct::all();

//     return view('admin.pages.products.create-form', [
//         'brands' => $brands,
//         'cates' => $cates,
//         'colors' => $colors,
//         'sizes' => $sizes,
//         'sttProduct' => $sttProduct
//     ]);
// }







    

// //    



    
    

    // public function store(ProductRequest $request)
    // {
    //     $brands = Brand::all();
    //     $cates = SubCategory::all();
    //     $colors = Color::all();
    //     $sizes = Size::all();
    //     $sttProduct = StatusProduct::all();
    //     if ($request->method() === 'POST') {

    //         $data = $request->except('image');
    //         $data['slug'] = Str::slug($request->get('name'));
    //         if($request->hasFile('image')) {
    //             $data['image'] = Cloudinary::upload($request->file('image')->getRealPath(), array(
    //                 'folder' => 'Cara/Products',
    //                 'overwrite' => TRUE,
    //                 'resource_type' => 'image'
    //             ))->getSecurePath();
    //         }
    //         $product = Product::create($data);

    //         return checkEndDisplayMsg($product, 'success', 'Thành công', 'Thêm mới thành công', 'admin.product.index');
    //     }
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
