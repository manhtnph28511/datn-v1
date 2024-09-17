<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeCategoryController extends Controller
{
   
    public function detailCate($id)
{
    $subCate = SubCategory::where('categories_id', '=', $id)->get();
    
   $productToCate = Product::select(
            'sub_categories.name as subCateName',
            'categories.name as cateName',
            'products.id',
            'products.name',
            'products.image',
            'products.price',
            DB::raw('COALESCE(AVG(ratings.rating), 0) as avg_rating')
        )
        ->leftJoin('sub_categories', 'sub_categories.id', '=', 'products.cate_id')
        ->leftJoin('categories', 'categories.id', '=', 'sub_categories.categories_id')
        ->leftJoin('ratings', 'ratings.product_id', '=', 'products.id')
        ->where('categories.id', $id)
        ->groupBy(
            'sub_categories.name',
            'categories.name',
            'products.id',
            'products.name',
            'products.image',
            'products.price'
        )
        ->limit(8)
        ->get();


    $carts = DB::table('carts')
        ->leftJoin('users', 'users.id', '=', 'carts.user_id')
        ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
        ->leftJoin('sizes', 'sizes.id', '=', 'carts.size_id')
        ->where('carts.user_id', '=', Auth::user()?->id)
        ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'users.name as username')
        ->get();

    $cates = Category::all();

    return view('clients.pages.detail-category', compact('subCate', 'productToCate', 'carts', 'cates'));
}



    



    



}
