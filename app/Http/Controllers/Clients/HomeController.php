<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    // trang chủ
    public function home() {
        $products = Product::with('ratings')->get();
        return view('clients.pages.home', compact('products'));
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $category = $request->input('category');
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    $products = Product::query()
        ->when($query, function ($query, $queryText) {
            return $query->where('name', 'LIKE', "%{$queryText}%");
        })
        ->when($category, function ($query, $category) {
            return $query->where('cate_id', $category);
        })
        ->when($minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })
        ->when($maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })
        ->get();

    $categories = Category::all(); // Để sử dụng trong dropdown

    return view('clients.pages.home', compact('products', 'categories'));
}

public function filter(Request $request)
{
    $query = $request->input('query');
    $category = $request->input('category');
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    $products = Product::query()
        ->where('name', 'LIKE', "%{$query}%")
        ->when($category, function ($query, $category) {
            return $query->where('cate_id', $category);
        })
        ->when($minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })
        ->when($maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })
        ->get();

    $categories = Category::all(); // Để sử dụng trong dropdown

    return view('clients.pages.home', compact('products', 'categories'));
}




}
