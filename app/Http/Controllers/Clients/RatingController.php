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
        // Xác thực người dùng đã đăng nhập
        $user = Auth::user();
    $productId = $request->input('product_id'); // Hoặc tham số tương tự

    // Kiểm tra xem người dùng có mua sản phẩm này với trạng thái thành công không
    $hasPurchased = Order::where('user_id', $user->id)
        ->whereHas('orderDetails', function($query) use ($productId) {
            $query->where('pro_id', $productId)
                  ->where('order_status', 'SUCCESS'); // Kiểm tra trạng thái đơn hàng
        })
        ->exists();

    if (!$hasPurchased) {
        return redirect()->back()->with('error', 'Bạn chỉ có thể đánh giá sản phẩm đã mua và nhận hàng thành công.');
    }

        // Tạo mới đánh giá
        Rating::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi thành công.');
    }

    public function destroy(Rating $rating){
        $rating->delete();
        toast('Xóa bình luận thành công','success');
        return back();
    }
}
