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

public function showProduct($id, Request $request)
{
    
    $product = Product::with('product_variants.size', 'product_variants.color')->find($id);

   
    $sizes = Size::all();
    $colors = Color::all();

   
    $variants = $product->product_variants;

   
    $selectedSizeId = $request->input('size_id', '');
    $selectedColorId = $request->input('color_id', '');


    $product->increment('view');

    // Trả về view cùng với dữ liệu
    return view('clients.pages.detail-product', [
        'product' => $product,
        'sizes' => $sizes,
        'colors' => $colors,
        'selectedSizeId' => $selectedSizeId,
        'selectedColorId' => $selectedColorId,
        'variants' => $variants,
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
