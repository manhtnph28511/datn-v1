<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartController extends Controller
{
    // Cart
    public function cart()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $carts = DB::table('carts')
                ->leftJoin('users', 'users.id', '=', 'carts.user_id')
                ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
                ->leftJoin('sizes', 'sizes.id', '=', 'carts.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'carts.color_id')
                ->where('user_id', '=', $userId)
                ->select(
                    'carts.*',
                    'products.id as pro_id',
                    'products.name as proName',
                    'products.image',
                    'users.name as username',
                    'sizes.name as sizeName', // Thêm size name
                    'colors.name as colorName' // Thêm color name
                )
                ->get();
            return view('clients.pages.cart', compact('carts'));
        }
        return back();
    }
    

       public function addToCart(Request $request)
{
    if (!$request->has('pro_id')) {
        toast()->error('Lỗi');
        return back();
    }

    if (Auth::check()) {
        if (Auth::user()->role !== 1) {
            $proId = $request->get('pro_id');
            $productToCart = Product::find($proId);

            if ($request->quantity > $productToCart->quantity) {
                toast()->error('Số lượng sản phẩm không hợp lệ');
                return back();
            }

            // Kiểm tra giá trị color_id và size_id có hợp lệ không
            $sizeId = $request->input('size_id');
            $colorId = $request->input('color_id');

            // Nếu người dùng chưa chọn size hoặc color, hiển thị thông báo lỗi và chuyển hướng về trang chi tiết sản phẩm
            if (empty($sizeId) || $sizeId == 'Select size' || empty($colorId) || $colorId == 'Select color') {
                toast()->error('Vui lòng chọn size và màu sắc trước khi thêm vào giỏ hàng.');
                return back(); // Chuyển hướng về trang chi tiết sản phẩm
            }

            try {
                $isSuccess = Cart::create([
                    'pro_id' => $proId,
                    'user_id' => Auth::user()->id,
                    'size_id' => $sizeId,
                    'color_id' => $colorId,
                    'price' => $productToCart->price,
                    'quantity' => $request->quantity,
                    'total_price' => ($productToCart->price * $request->quantity)
                ]);

                return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Thêm giỏ hàng thành công', 'home.cart');
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        return back();
    }
    return back();
}

    // Update cart
    public function updateCart(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role !== 1) {
                if ($request->has('id') && $request->has('pro_id')) {
                    $cartId = $request->get('id');
                    $proId = $request->get('pro_id');
                    $quantityByProduct = Product::find($proId);

                    if ($request->quantity <= 0) {
                        Cart::destroy($cartId);
                        return back();
                    }
                    if ($request->quantity > $quantityByProduct->quantity) {
                        toast('Cập nhật không thành công', 'warning');
                        return back();
                    }
                    try {
                        Cart::where('id', $cartId)->update([
                            'quantity' => $request->quantity
                        ]);
                        toast('Cập nhật thành công', 'success');
                        return back();
                    } catch (\Throwable $th) {
                        return $th->getMessage();
                    }
                }
            }
            return back();
        }
        return back();
    }

    // Remove cart
    public function destroy($id)
    {
        try {
            $isSuccess = Cart::destroy($id);
            return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Xóa sản phẩm thành công', 'home.cart');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // Check out
    public function checkout()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $carts = DB::table('carts')
                ->leftJoin('users', 'users.id', '=', 'carts.user_id')
                ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
                ->leftJoin('sizes', 'sizes.id', '=', 'carts.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'carts.color_id')
                ->where('user_id', '=', $userId)
                ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'users.name as username')->get();
            return view('clients.pages.orders.checkout', compact('carts'));
        }
        return back();
    }



public function checkoutStep(Request $request)
{
    // Xác thực dữ liệu từ request
    $validatedData = $request->validate([
        'username' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'note' => 'nullable|string|max:1000',
    ]);

    $stripe = new \Stripe\StripeClient('sk_test_51OCaeXJEiz1nZ8wauNXZTuCnNk3n6JOPOeucvWgKw0mYqTY6UswavZHHhoa9PKzzz02KnfRVrAPq4vAPAWgWuNls002uS07q7Z');
    $line_items = [];

    // Lấy thông tin giỏ hàng của người dùng
    $carts = DB::table('carts')
        ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
        ->where('carts.user_id', auth()->user()->id)
        ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'products.price')
        ->get();

    // Tạo danh sách các mục thanh toán cho Stripe
    foreach ($carts as $item) {
        $line_items[] = [
            'price_data' => [
                'currency' => 'vnd', // Kiểm tra xem tiền tệ này có được hỗ trợ không
                'product_data' => [
                    'name' => $item->proName,
                    'images' => [$item->image],
                    
                ],
                'unit_amount' => $item->price * 1, // Đơn giá tính bằng cent
            ],
            'quantity' => $item->quantity,
        ];
    }

    // Tạo phiên thanh toán với Stripe
    try {
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'], // Đảm bảo loại phương thức thanh toán đã được kích hoạt
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('order-success'), // Route để xử lý khi thanh toán thành công
            'cancel_url' => route('home.cart'), // Route để xử lý khi người dùng hủy thanh toán
        ]);

        // Tạo đơn hàng trong cơ sở dữ liệu
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->username = $validatedData['username'];
        $order->address = $validatedData['address'];
        $order->phone = $validatedData['phone'];
        $order->note = $validatedData['note'] ?? '';
        $order->save();

        // Lưu ID đơn hàng vào session để sử dụng trong phương thức success
        session()->put('order_id', $order->id);
        $userId = auth()->user()->id;
        DB::table('carts')->where('user_id', $userId)->delete();

        return redirect($session->url);
    } catch (\Exception $e) {
        // Xử lý lỗi nếu có
        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi tạo phiên thanh toán. Vui lòng thử lại.');
    }
}



public function success(Request $request)
{
    // Lấy ID đơn hàng từ session
//     $order_id = session('order_id');

//     if (!$order_id) {
//         toast('Đơn hàng không hợp lệ.', 'error');
//         return redirect()->route('home.cart');
//     }

//     // Tìm đơn hàng dựa trên ID
//     $order = Order::find($order_id);
//     if (!$order) {
//         toast('Đơn hàng không tìm thấy.', 'error');
//         return redirect()->route('home.cart');
//     }

//     $userId = auth()->user()->id;

//     // Lấy giỏ hàng của người dùng
//     $carts = DB::table('carts')
//         ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
//         ->leftJoin('sizes', 'sizes.id', '=', 'carts.size_id')
//         ->leftJoin('colors', 'colors.id', '=', 'carts.color_id')
//         ->where('carts.user_id', $userId)
//         ->select(
//             'carts.*',
//             'products.id as pro_id',
//             'products.name as proName',
//             'products.image',
//             'sizes.name as sizeName',
//             'colors.name as colorName'
//         )
//         ->get();
//         DB::table('carts')->where('user_id', $userId)->delete();
//     if ($carts->isEmpty()) {
//         toast('Giỏ hàng rỗng.', 'error');
//         return redirect()->route('home.cart');
//     }

//     // Bắt đầu giao dịch để đảm bảo tất cả các bước thành công
//     DB::beginTransaction();
//     try {
//         // Thêm chi tiết đơn hàng vào bảng order_details
//         foreach ($carts as $item) {
//             OrderDetail::create([
//                 'order_id' => $order->id,
//                 'pro_id' => $item->pro_id,
//                 'size_id' => $item->size_id ?? 0,
//                 'color_id' => $item->color_id ?? 0,
//                 'price' => $item->price,
//                 'quantity' => $item->quantity,
//                 'total_price' => $item->price * $item->quantity,
//                 'type' => $item->type ?? 'N/A',
//             ]);
//         }

//         // Xóa sản phẩm trong giỏ hàng
//         // DB::table('carts')->where('user_id', $userId)->delete();

//         // Gửi email xác nhận đơn hàng
//         Mail::to(auth()->user()->email)->send(new OrderMail());

//         // Xóa ID đơn hàng khỏi session
//         session()->forget('order_id');

//         // Commit giao dịch nếu tất cả các bước thành công
//         DB::commit();

//         // Chuyển hướng đến trang thành công
//         return view('home.order-success');
//     } catch (\Exception $e) {
//         // Rollback giao dịch nếu có lỗi xảy ra
//         DB::rollback();
//         Log::error('Lỗi khi xử lý đơn hàng: ' . $e->getMessage());
//         toast('Có lỗi xảy ra khi xử lý đơn hàng.', 'error');
//         return redirect()->route('home.cart');
//     }
}



}


