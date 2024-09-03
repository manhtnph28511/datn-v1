<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class RatingController extends Controller
{

    public function show($id)
    {
        $product = Product::with('ratings')->findOrFail($id);

        return view('products.show', compact('product'));
    }
    public function rating(Request $request)
{
    $user = Auth::user();
    $productId = $request->input('product_id');
    
    // Kiểm tra productId có hợp lệ hay không
    if (!$productId) {
        return redirect()->back()->with('error', 'Không xác định được sản phẩm để đánh giá.');
    }

    // Kiểm tra người dùng đã mua và nhận sản phẩm chưa
    $hasPurchased = Order::where('user_id', $user->id)
        ->whereHas('orderDetails', function($query) use ($productId) {
            $query->where('pro_id', $productId)
                  ->where('order_status', 'SUCCESS');
        })
        ->exists();

    if (!$hasPurchased) {
        return redirect()->back()->with('error', 'Bạn chỉ có thể đánh giá sản phẩm đã mua và nhận hàng thành công.');
    }

    // Kiểm tra người dùng đã đánh giá sản phẩm này chưa
    $existingRating = Rating::where('user_id', $user->id)
        ->where('product_id', $productId)
        ->exists();

    if ($existingRating) {
        return redirect()->back()->with('error', 'Bạn đã đánh giá sản phẩm này rồi.');
    }

    // Tạo đánh giá mới
    Rating::create([
        'user_id' => $user->id,
        'product_id' => $productId,
        'rating' => $request->input('rating'),
        'review' => $request->input('review'),
    ]);

    return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi thành công.');
}

    

    public function index()
    {
        $ratings = Rating::with('product')->orderBy('created_at', 'desc')->get();

        return view('clients.pages.ratings.index', compact('ratings'));
    }

    public function edit($id)
    {
        $rating = Rating::findOrFail($id);
        return view('clients.pages.ratings.edit', compact('rating'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'nullable|string',
        ]);

        $rating = Rating::findOrFail($id);
        $rating->update([
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        return redirect()->route('clients.ratings.index')->with('success', 'Đánh giá đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return redirect()->route('clients.ratings.index')->with('success', 'Đánh giá đã được xóa thành công.');
    }
}
