<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Illuminate\Validation\Rule;
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

                    return checkEndDisplayMsg('success', $isSuccess, 'Thành công', 'Thêm giỏ hàng thành công', 'home.cart');
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



    // public function checkoutStep(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'username' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'phone' => 'required|string|max:20',
    //         'email' => 'required|string|max:100',
    //         'note' => 'nullable|string|max:1000',
    //         'type_order' => ['required', Rule::in(1, 2)],
    //     ], [
    //         'username.required' => 'Họ tên không được để trống',
    //         'address.required' => 'Địa chỉ không được để trống',
    //         'phone.required' => 'Số điện thoại không được để trống',
    //         'email.required' => 'Email không được để trống',
    //         'type_order.in' => 'Chưa chọn phương thức thanh toán',
    //     ]);
    //     if ($request->type_order === '1') {
    //         // Xác thực dữ liệu từ request

    //         $stripe = new \Stripe\StripeClient('sk_test_51OCaeXJEiz1nZ8wauNXZTuCnNk3n6JOPOeucvWgKw0mYqTY6UswavZHHhoa9PKzzz02KnfRVrAPq4vAPAWgWuNls002uS07q7Z');
    //         $line_items = [];

    //         // Lấy thông tin giỏ hàng của người dùng
    //         $carts = DB::table('carts')
    //             ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
    //             ->where('carts.user_id', auth()->user()->id)
    //             ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'products.price')
    //             ->get();

    //         // Tạo danh sách các mục thanh toán cho Stripe
    //         foreach ($carts as $item) {
    //             $line_items[] = [
    //                 'price_data' => [
    //                     'currency' => 'vnd', // Kiểm tra xem tiền tệ này có được hỗ trợ không
    //                     'product_data' => [
    //                         'name' => $item->proName,
    //                         'images' => [$item->image],
    //                     ],
    //                     'unit_amount' => $item->price * 1, // Đơn giá tính bằng cent
    //                 ],
    //                 'quantity' => $item->quantity,
    //             ];
    //         }

    //         // Tạo phiên thanh toán với Stripe
    //         try {
    //             $session = $stripe->checkout->sessions->create([
    //                 'payment_method_types' => ['card'], // Đảm bảo loại phương thức thanh toán đã được kích hoạt
    //                 'line_items' => $line_items,
    //                 'mode' => 'payment',
    //                 'success_url' => route('order-success'), // Route để xử lý khi thanh toán thành công
    //                 'cancel_url' => route('home.cart'), // Route để xử lý khi người dùng hủy thanh toán
    //             ]);

    //             // Tạo đơn hàng trong cơ sở dữ liệu
    //             $order = new Order();
    //             $order->user_id = auth()->user()->id;
    //             $order->username = $validatedData['username'];
    //             $order->address = $validatedData['address'];
    //             $order->phone = $validatedData['phone'];
    //             $order->email = $validatedData['email'];
    //             $order->note = $validatedData['note'] ?? '';
    //             $order->save();

    //             foreach ($request->input('carts') as $cart) {
    //                 OrderDetail::create([
    //                     'order_id' => $order->id,
    //                     'pro_id' => $cart['pro_id'],
    //                     'size_id' => $cart['size_id'] ?? null,
    //                     'color_id' => $cart['color_id'] ?? null,
    //                     'price' => $cart['price'],
    //                     'quantity' => $cart['quantity'],
    //                     'total_price' => $cart['price'] * $cart['quantity'],
    //                     'type' => $request->input('type_order'),
    //                 ]);
    //             }

    //             // Lưu ID đơn hàng vào session để sử dụng trong phương thức success
    //             session()->put('order_id', $order->id);
    //             $userId = auth()->user()->id;
    //             DB::table('carts')->where('user_id', $userId)->delete();
    //             // Mail::to(Auth::user()->email)->send(new OrderMail());

    //             return redirect($session->url);
    //         } catch (\Exception $e) {
    //             // Xử lý lỗi nếu có
    //             return redirect()->back()->with('error', 'Đã xảy ra lỗi khi tạo phiên thanh toán. Vui lòng thử lại.');
    //         }
    //     }
    //     if ($request->type_order === '2') {
    //         $order = new Order();
    //         $order->user_id = auth()->user()->id;
    //         $order->username = $validatedData['username'];
    //         $order->address = $validatedData['address'];
    //         $order->phone = $validatedData['phone'];
    //         $order->email = $validatedData['email'];
    //         $order->note = $validatedData['note'] ?? '';
    //         $order->save();
    //         DB::table('carts')->where('user_id', auth()->user()->id)->delete();

    //         return redirect()->route('order-success');
    //     }
    // }

    public function checkoutStep(Request $request)
{
    $validatedData = $request->validate([
        'username' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|string|max:100',
        'note' => 'nullable|string|max:1000',
        'type_order' => ['required', Rule::in(1, 2)],
    ], [
        'username.required' => 'Họ tên không được để trống',
        'address.required' => 'Địa chỉ không được để trống',
        'phone.required' => 'Số điện thoại không được để trống',
        'email.required' => 'Email không được để trống',
        'type_order.in' => 'Chưa chọn phương thức thanh toán',
    ]);

    $carts = DB::table('carts')
        ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
        ->where('carts.user_id', auth()->user()->id)
        ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'products.price')
        ->get();

    if ($request->type_order === '1') {
        $stripe = new \Stripe\StripeClient('sk_test_51OCaeXJEiz1nZ8wauNXZTuCnNk3n6JOPOeucvWgKw0mYqTY6UswavZHHhoa9PKzzz02KnfRVrAPq4vAPAWgWuNls002uS07q7Z');
        $line_items = [];

        foreach ($carts as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'vnd',
                    'product_data' => [
                        'name' => $item->proName,
                        'images' => [$item->image],
                    ],
                    'unit_amount' => $item->price * 1,
                ],
                'quantity' => $item->quantity,
            ];
        }

        try {
            $session = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('order-success'),
                'cancel_url' => route('home.cart'),
            ]);

            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->username = $validatedData['username'];
            $order->address = $validatedData['address'];
            $order->phone = $validatedData['phone'];
            $order->email = $validatedData['email'];
            $order->note = $validatedData['note'] ?? '';
            $order->payment_method =  'Credit_card' ;
           
           

            $order->save();

            foreach ($carts as $cart) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'pro_id' => $cart->pro_id,
                    'size_id' => $cart->size_id ?? null,
                    'color_id' => $cart->color_id ?? null,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                    'total_price' => $cart->price * $cart->quantity,
                     'status' => 'pending',
                ]);
            }


            Notification::create([
                'type' => 'đã đặt hàng',
                'order_id' =>  $order->id,
                'data' => json_encode([
                    'message' => 'Có đơn hàng mới! Đơn hàng #' . $order->id,
                    'order_details' => [
                        'username' => $order->username,
                        'address' => $order->address,
                        'phone' => $order->phone,
                        'email' => $order->email,
                        'note' => $order->note,
                    ]
                ]),
                'is_read' => false,
            ]);
    
            session()->put('order_id', $order->id);
            DB::table('carts')->where('user_id', auth()->user()->id)->delete();

            return redirect($session->url);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi tạo phiên thanh toán. Vui lòng thử lại.');
        }
    }

    if ($request->type_order === '2') {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->username = $validatedData['username'];
        $order->address = $validatedData['address'];
        $order->phone = $validatedData['phone'];
        $order->email = $validatedData['email'];
        $order->note = $validatedData['note'] ?? '';
        $order->payment_method = 'COD';
        $order->save();

        foreach ($carts as $cart) {
            OrderDetail::create([
                'order_id' => $order->id,
                'pro_id' => $cart->pro_id,
                'size_id' => $cart->size_id ?? null,
                'color_id' => $cart->color_id ?? null,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
                'total_price' => $cart->price * $cart->quantity,
                'status' => 'pending',
            ]);
        }

        Notification::create([
            'type' => 'đã đặt hàng',
            'order_id' =>  $order->id,
            'data' => json_encode([
                'message' => 'Có đơn hàng mới! Đơn hàng #' . $order->id,
                'order_details' => [
                    'username' => $order->username,
                    'address' => $order->address,
                    'phone' => $order->phone,
                    'email' => $order->email,
                    'note' => $order->note,
                ]
            ]),
            'is_read' => false,
        ]);



        DB::table('carts')->where('user_id', auth()->user()->id)->delete();


        // $this->sendOrderNotification($order);

        return redirect()->route('order-success');
    }
}







    // public function success(Request $request)
    // {
    //     $order = new Order();
    //     $carts = Cart::all();
    //     $user_id = Auth::user()->id;
    //     $user = User::find($user_id);
    //     $order->user_id = $user_id;
    //     $order->username = $user->name;
    //     $order->address = $user->address;
    //     $order->phone = $user->phone;
    //     $order->save();

    // foreach ($carts as $item) {
    //     OrderDetail::create([
    //         'order_id' => $order->id,
    //         'pro_id' => $item->pro_id,
    //         'price' => $item->price,
    //         'quantity' => $item->quantity,
    //         'total_price' => ($item->quantity * $item->price)
    //     ]);
    //     DB::statement("UPDATE products SET quantity = quantity - $item->quantity WHERE id = $item->pro_id");
    //     Cart::destroy($item->id);
    // }
    //     Mail::to(Auth::user()->email)->send(new OrderMail());
    // }
}