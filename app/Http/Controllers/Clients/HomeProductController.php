<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Size;
use App\Models\Color;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeProductController extends Controller
{
    // detail product

    // public function showProduct($id, $slug, Request $request)
    // {
    //     if ($request->has('cate')) {
    //         $cate_id = $request->get('cate');
    //         $similarProductByCate = Product::where('cate_id', '=', $cate_id)->where('id', '<>', $id)->limit(4)->get();
    //         $product = Product::find($id);
    //         $sizes = Size::all();
    //         $colors=Color::all();
    //         $ratings = Rating::query()->leftJoin('users', 'users.id', '=', 'ratings.user_id')
    //             ->leftJoin('products', 'products.id', '=', 'ratings.product_id')
    //             ->select('ratings.*', 'users.name as username', 'users.avatar as user_avatar', 'products.name as product_name')
    //             ->where('product_id', $id)
    //             ->paginate(5);
    //         Product::where('id', $id)->update([
    //             'view' => $product->view + 1
    //         ]);
    //         return view('clients.pages.detail-product', compact('product', 'sizes','colors', 'similarProductByCate', 'ratings'));
    //     }
    //     toast('Lỗi', 'error');
    //     return back();
    // }
    //
// public function showProduct($id, $slug, Request $request)
// {
//     $product = Product::with('product_variants')->find($id);
//     $sizes = Size::all();
//     $colors = Color::all();
//     $variantError = null;
    
//     // Kiểm tra biến thể nếu có size_id và color_id trong request
//     $selectedSizeId = $request->get('size_id');
//     $selectedColorId = $request->get('color_id');
    
//     // if ($selectedSizeId && $selectedColorId) {
//     //     $matchingVariant = $product->product_variants->first(function ($variant) use ($selectedSizeId, $selectedColorId) {
//     //         return $variant->size_id == $selectedSizeId && $variant->color_id == $selectedColorId;
//     //     });
        
//     //     if (!$matchingVariant) {
//     //         $variantError = 'Sản phẩm đã hết hàng';
//     //     }
//     // }

//     if ($product && $selectedSizeId && $selectedColorId) {
    
//         // Kiểm tra size_id và color_id của sản phẩm chính
//         if ($product->size_id == $selectedSizeId && $product->color_id == $selectedColorId) {
//             // Sản phẩm chính trùng khớp với size_id và color_id
//             if ($product->quantity <= 0) {
//                 $variantError = 'Sản phẩm chính đã hết hàng';
//             }

//         }else{
//         $matchingVariant = $product->product_variants->first(function ($variant) use ($selectedSizeId, $selectedColorId) {
//             return $variant->size_id == $selectedSizeId && $variant->color_id == $selectedColorId;
//         });
        
//         if (!$matchingVariant) {
//             $variantError = 'Sản phẩm đã hết hàng';
//         }
//     }
    
//     }
//     // Truyền dữ liệu đến view
//     return view('clients.pages.detail-product', [
//         'product' => $product,
//         'sizes' => $sizes,
//         'colors' => $colors,
//         'variantError' => $variantError,
//     ]);
// }
public function showProduct($id, $slug, Request $request)
{
   
    $product = Product::with('product_variants')->find($id);
    $sizes = Size::all();
    $colors = Color::all();
    // $variantError = null;

    // Lấy các giá trị đã chọn từ request
    // $selectedSizeId = $request->input('size_id');
    // $selectedColorId = $request->input('color_id');

    
    // if ($product) {
    //     // Kiểm tra size_id và color_id của sản phẩm chính
    //     if ($selectedSizeId && $selectedColorId) {
    //         // Kiểm tra sản phẩm chính
    //         if ($product->size_id == $selectedSizeId && $product->color_id == $selectedColorId) {
    //             if ($product->quantity <= 0) {
    //                 $variantError = 'Sản phẩm chính đã hết hàng';
    //             }
    //         } else {
    //             // Kiểm tra biến thể
    //             $matchingVariant = $product->product_variants->first(function ($variant) use ($selectedSizeId, $selectedColorId) {
    //                 return $variant->size_id == $selectedSizeId && $variant->color_id == $selectedColorId;
    //             });

    //             if (!$matchingVariant || $matchingVariant->quantity <= 0) {
    //                 $variantError = 'Biến thể sản phẩm đã hết hàng';
    //             }
    //         }
    //     } else {
    //         $variantError = 'Vui lòng chọn kích thước và màu sắc.';
    //     }
    // } else {
    //     $variantError = 'Sản phẩm không tồn tại.';
    // }

    return view('clients.pages.detail-product', [
        'product' => $product,
        'sizes' => $sizes,
        'colors' => $colors,
        // 'variantError' => $variantError,
    ]);
}





    // shop-page
    public function shop()
    {
        $products = Product::paginate(4);
        $cates = Category::all();
        $carts = DB::table('carts')
            ->leftJoin('users', 'users.id', '=', 'carts.user_id')
            ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'carts.size_id')
            ->where('user_id', '=', Auth::user()?->id)
            ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'users.name as username')->get();
        return view('clients.pages.shop', compact('products', 'cates', 'carts'));
    }


    // product from sub cate
    public function productFromSubCate($id)
    {
        $subCate = SubCategory::all();
        $proFromSubCate = Product::where('cate_id', '=', $id)->get();
        $carts = DB::table('carts')
            ->leftJoin('users', 'users.id', '=', 'carts.user_id')
            ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'carts.size_id')
            ->where('user_id', '=', Auth::user()?->id)
            ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'users.name as username')->get();
        return view('clients.pages.detail-pro-from-subcate', compact('proFromSubCate', 'subCate', 'carts'));
    }

    //search product
    public function searchProductHome(Request $request)
    {
        $name = $request->name;
        $subCate = SubCategory::all();
        $productBySearch = Product::where('name', 'LIKE', "%$name%")->get();
        return view('clients.pages.view-product-search', compact('productBySearch', 'subCate'));
    }
}
