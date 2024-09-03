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

    public function home() {
      
        $products = Product::with('ratings')
                        ->orderBy('created_at', 'desc') 
                        ->get();

        return view('clients.pages.home', compact('products'));
    }



    public function searchByName(Request $request)
    {
        $name = $request->input('name');
        $products = Product::where('name', 'like', "%$name%")->get();
        return view('clients.pages.home', compact('products'));
    }

    public function searchByPrice(Request $request)
    {
       
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        
        $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();
        return view('clients.pages.home', compact('products'));
    }




}
