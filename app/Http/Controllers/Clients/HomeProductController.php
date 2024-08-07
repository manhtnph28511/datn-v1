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
//     public function showProduct($id, $slug, Request $request)
// {
//     $product = Product::with('product_variants')->find($id);
//     $sizes = Size::all();
//     $colors = Color::all();
//     $variantPrice = $product->price; // Mặc định là giá của sản phẩm chính
//     $variantError = null;

//     // Kiểm tra nếu có size và màu được chọn trong request
//     $selectedSizeId = $request->get('size_id');
//     $selectedColorId = $request->get('color_id');

//     // Lấy tất cả các biến thể của sản phẩm
//     $variants = $product->product_variants;

//     if ($selectedSizeId && $selectedColorId) {
//         $variant = $variants->first(function ($variant) use ($selectedSizeId, $selectedColorId) {
//             return $variant->size_id == $selectedSizeId && $variant->color_id == $selectedColorId;
//         });

//         if ($variant) {
//             $variantPrice = $variant->price;
//         } else {
//             $variantError = 'Biến thể không tồn tại';
//         }
//     }

//     return view('clients.pages.detail-product', [
//         'product' => $product,
//         'sizes' => $sizes,
//         'colors' => $colors,
//         'variantPrice' => $variantPrice,
//         'variantError' => $variantError,
//         'variants' => $variants, // Truyền thông tin về các biến thể đến view
//     ]);
// }
// public function showProduct($id, $slug, Request $request)
// {
//     $product = Product::with('product_variants')->find($id);
//     $sizes = Size::all();
//     $colors = Color::all();
//     $variantPrice = $product->price; // Giá mặc định của sản phẩm chính
//     $variantError = null;

//     // Lấy tất cả các biến thể của sản phẩm
//     $variants = $product->product_variants;

//     return view('clients.pages.detail-product', [
//         'product' => $product,
//         'sizes' => $sizes,
//         'colors' => $colors,
//         'variantPrice' => $variantPrice,
//         'variantError' => $variantError,
//         'variants' => $variants
//     ]);
// }
public function showProduct($id, $slug, Request $request)
{
    $product = Product::with('product_variants')->find($id);
    $sizes = Size::all();
    $colors = Color::all();
    $variantError = null;
    
    // Kiểm tra biến thể nếu có size_id và color_id trong request
    $selectedSizeId = $request->get('size_id');
    $selectedColorId = $request->get('color_id');
    
    if ($selectedSizeId && $selectedColorId) {
        $matchingVariant = $product->product_variants->first(function ($variant) use ($selectedSizeId, $selectedColorId) {
            return $variant->size_id == $selectedSizeId && $variant->color_id == $selectedColorId;
        });
        
        if (!$matchingVariant) {
            $variantError = 'Sản phẩm đã hết hàng';
        }
    }

    // Truyền dữ liệu đến view
    return view('clients.pages.detail-product', [
        'product' => $product,
        'sizes' => $sizes,
        'colors' => $colors,
        'variantError' => $variantError,
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
