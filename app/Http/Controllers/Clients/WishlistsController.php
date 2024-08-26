<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class WishlistsController extends Controller
{
    public function addToWishlist(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size_id' => 'nullable|exists:sizes,id',
            'color_id' => 'nullable|exists:colors,id',
        ]);

        $user = Auth::user();
        
        // Kiểm tra xem sản phẩm đã tồn tại trong wishlist chưa
        $exists = Wishlist::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->where('size_id', $request->size_id)
            ->where('color_id', $request->color_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Sản phẩm này đã có trong Wishlist của bạn.');
        }

        // Thêm sản phẩm vào wishlist
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
        ]);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào Wishlist.');
    }

    public function show()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())->with('product')->get();

        return view('clients.pages.wishlists.index', compact('wishlistItems'));
    }

    public function removeFromWishlist($id)
    {
        $userId = auth()->id();
    
        $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $id)->first();
    
        if ($wishlistItem) {
            $wishlistItem->delete();
            return back()->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích.');
        } else {
            return back()->with('error', 'Sản phẩm không có trong danh sách yêu thích.');
        }
    }
    
}
