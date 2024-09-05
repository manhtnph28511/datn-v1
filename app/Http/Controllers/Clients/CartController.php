<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Notification;
use App\Models\ClientsNotification;
use App\Models\User;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Str;




class CartController extends Controller
{
    // Cart
    public function cart()
{
    if (auth()->check()) {
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
                // 'products.image',
                'users.name as username',
                'sizes.name as sizeName',
                'colors.name as colorName',
                'carts.image_variant',
                
            )
            ->get();
        return view('clients.pages.cart', compact('carts'));
    }
    return back();
}


   

 public function addToCart(Request $request)
{
    $user = auth()->user();

    // Kiểm tra trạng thái của người dùng
    if ($user->status == 0) {
        return redirect()->back()->withErrors(['error' => 'Tài khoản của bạn đã bị khóa. Bạn không thể thực hiện mua hàng. Hãy chat với admin để mở khóa trước!']);
    }

    if (!$request->has('pro_id')) {
        toast()->error('Lỗi');
        return back();
    }

    if (Auth::check()) {
        $proId = $request->get('pro_id');
        $colorId = $request->get('color_id');
        $sizeId = $request->get('size_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::with('product_variants')->find($proId);

        if (!$product) {
            toast()->error('Sản phẩm không tồn tại');
            return back();
        }

        if (!$colorId || !$sizeId) {
            return redirect()->back()->withErrors(['error' => 'Vui lòng chọn kích thước và màu sắc.']);
        }

        // Kiểm tra nếu người dùng chọn kích thước và màu sắc
        $image = null;
        if ($sizeId && $colorId) {
            $variant = $product->product_variants->first(function ($variant) use ($sizeId, $colorId) {
                return $variant->size_id == $sizeId && $variant->color_id == $colorId;
            });

            if ($variant) {
                if ($quantity > $variant->quantity) {
                    toast()->error('Số lượng yêu cầu vượt quá số lượng có sẵn hoặc đã hết hàng');
                    return back();
                }

                // Lấy giá trị của image_variant từ biến thể
                $price = $variant->price;
                $image = $variant->image_variant; // Đảm bảo giá trị được gán đúng từ đối tượng variant
            } else {
                if ($product->size_id == $sizeId && $product->color_id == $colorId) {
                    if ($quantity > $product->quantity) {
                        toast()->error('Số lượng yêu cầu vượt quá số lượng có sẵn');
                        return back();
                    }

                    $price = $product->price;
                    $image = $product->image; // Sử dụng hình ảnh của sản phẩm nếu không có biến thể
                } else {
                    toast()->error('Biến thể sản phẩm không tồn tại');
                    return back();
                }
            }
        } else {
            toast()->error('Vui lòng chọn kích thước và màu sắc.');
            return back();
        }

        try {
            $isSuccess = Cart::create([
                'pro_id' => $proId,
                'user_id' => Auth::user()->id,
                'size_id' => $sizeId,
                'color_id' => $colorId,
                'price' => $price,
                'quantity' => $quantity,
                'total_price' => ($price * $quantity),
                'image_variant' => $image // Đây là nơi bạn gán giá trị cho image_variant
            ]);

            return checkEndDisplayMsg('success', $isSuccess, 'Thành công', 'Thêm giỏ hàng thành công', 'home.cart');
        } catch (\Throwable $th) {
            toast()->error('Đã xảy ra lỗi: ' . $th->getMessage());
            return back();
        }
    }

    return back();
}

    









    public function updateCart(Request $request)
{


    

    if (Auth::check() && Auth::user()->role !== 1) {
        if ($request->has('id') && $request->has('pro_id') && $request->has('quantity')) {
            $cartId = $request->get('id');
            $proId = $request->get('pro_id');
            $quantity = $request->get('quantity');
            $sizeId = $request->get('size_id'); // Có thể là null nếu không chọn kích thước
            $colorId = $request->get('color_id'); // Có thể là null nếu không chọn màu sắc

            $product = Product::with('product_variants')->find($proId);

            if (!$product) {
                toast('Sản phẩm không tồn tại', 'error');
                return back();
            }

            $cart = Cart::find($cartId);
            $price=$cart->price;
            // Nếu số lượng nhỏ hơn hoặc bằng 0, xóa giỏ hàng
            if ($quantity <= 0) {
                Cart::destroy($cartId);
                return back();
            }

            // Kiểm tra có phải là sản phẩm cơ bản hay biến thể
            $variant = $product->product_variants->first(function ($variant) use ($sizeId, $colorId) {
                return $variant->size_id == $sizeId && $variant->color_id == $colorId;
            });

            if ($variant) {
                // Xử lý khi có biến thể
                if ($quantity > $variant->quantity) {
                    toast('Số lượng biến thể yêu cầu vượt quá số lượng có sẵn', 'warning');
                    return back();
                }
                
               
            } else {
                // Xử lý khi không có biến thể
                if ($quantity > $product->quantity) {
                    toast('Số lượng sản phẩm yêu cầu vượt quá số lượng có sẵn', 'warning');
                    return back();
                }
            }

            try {

                Cart::where('id', $cartId)->update([
                    'quantity' => $quantity,
                    'total_price'=>$quantity*$price,
                ]);

                toast('Cập nhật thành công', 'success');
                return back();
            } catch (\Throwable $th) {
                toast('Có lỗi xảy ra: ' . $th->getMessage(), 'error');
                return back();
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

    public function voucher()
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
            return view('clients.pages.orders.voucher', compact('carts'));
        }
        return back();
    }

//tìm voucher
public function searchVouchers(Request $request)
{
    $userId = Auth::id();

    $carts = DB::table('carts')
        ->leftJoin('users', 'users.id', '=', 'carts.user_id')
        ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
        ->where('user_id', '=', $userId)
        ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'users.name as username')->get();

    // Lấy tất cả các voucher của người dùng kèm thông tin sản phẩm
    $userVouchers = UserVoucher::where('user_id', $userId)
        ->with('voucher') 
        ->get();

   
    return view('clients.pages.orders.voucher', [
        'carts' => $carts,
        'userVouchers' => $userVouchers,
    ]);
}

    




    public function applyVoucher(Request $request)
    {
        $request->validate([
            'voucher_code' => 'required|string',
            'pro_id' => 'sometimes|nullable|integer|exists:products,id',
        ]);
    
        // Lấy voucher từ mã voucher
        $voucher = Voucher::where('code', $request->input('voucher_code'))->first();
    
        if (!$voucher) {
            return back()->withErrors(['voucher_code' => 'Voucher không hợp lệ.']);
        }
    
        if ($voucher->expires_at < now()) {
            return back()->withErrors(['voucher_code' => 'Voucher đã hết hạn.']);
        }
    
        if ($voucher->quantity <= 0) {
            return back()->withErrors(['voucher_code' => 'Voucher đã được sử dụng hết.']);
        }
    
        // Lấy giỏ hàng của người dùng
        $user_id = auth()->id();
        $carts = Cart::where('user_id', $user_id)->get();
    
        // Kiểm tra xem voucher đã được áp dụng cho đơn hàng này chưa
        $voucherUsed = $carts->pluck('voucher_code')->contains($voucher->code);
        if ($voucherUsed) {
            return back()->withErrors(['voucher_code' => 'Voucher đã được sử dụng cho sản phẩm trong giỏ hàng này.']);
        }
    
        // Áp dụng voucher cho toàn bộ giỏ hàng hoặc sản phẩm cụ thể
        if ($voucher->product_id === null) {
            // Cập nhật giá cho từng sản phẩm trong giỏ hàng
            foreach ($carts as $cart) {
                $discountAmount = 0;
    
                if ($voucher->discount_type == 'percentage') {
                    // Tính giảm giá cho sản phẩm dựa trên giá của sản phẩm
                    $discountAmount = ($cart->total_price * $voucher->discount) / 100;
                } else {
                    // Nếu giảm giá cố định, áp dụng số tiền giảm giá cố định
                    $discountAmount = min($voucher->discount, $cart->total_price);
                }
    
                $cart->discounted_total_price = max($cart->total_price - $discountAmount, 0);
                $cart->voucher_code = $voucher->code; // Ghi nhận mã voucher áp dụng
                $cart->save();
            }
    
            // Cập nhật số lượng voucher
            $voucher->quantity--;
            $voucher->usage_count++;
            $voucher->save();
    
            return redirect()->back()->with('success', 'Voucher đã được áp dụng cho toàn bộ giỏ hàng!');
        } else {
            // Giảm giá cho sản phẩm cụ thể
            $cart = Cart::where('user_id', $user_id)->where('pro_id', $request->input('pro_id'))->first();
    
            if (!$cart) {
                return back()->withErrors(['error' => 'Sản phẩm không có trong giỏ hàng.']);
            }
    
            if ($voucher->product_id != $cart->pro_id) {
                return back()->withErrors(['voucher_code' => 'Voucher không áp dụng cho sản phẩm này.']);
            }
    
            $discountAmount = 0;

            
            if ($voucher->discount_type == 'percentage') {
                $discountAmount = ($cart->total_price * $voucher->discount) / 100;
            } else {
                $discountAmount = $voucher->discount;
            }
    
            $cart->discounted_total_price = max($cart->total_price - $discountAmount, 0);
            $cart->voucher_code = $voucher->code; // Ghi nhận mã voucher áp dụng
            $cart->save();
    
            $voucher->quantity--;
            $voucher->usage_count++;
            $voucher->save();
    
            return redirect()->back()->with('success', 'Voucher đã được áp dụng cho sản phẩm!');
        }
    }
    


    

    

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

    // Lấy danh sách sản phẩm trong giỏ hàng
    $carts = DB::table('carts')
        ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
        ->where('carts.user_id', auth()->user()->id)
        ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'carts.image_variant', 'carts.price', 'carts.discounted_total_price')
        ->get();

    // Tính tổng giá trị của giỏ hàng
    $totalPrice = $carts->sum(function ($item) {
        return $item->discounted_total_price ?? ($item->price * $item->quantity);
    });

    if ($request->type_order === '1') {
        // Thanh toán online
        $stripe = new \Stripe\StripeClient('sk_test_51OCaeXJEiz1nZ8wauNXZTuCnNk3n6JOPOeucvWgKw0mYqTY6UswavZHHhoa9PKzzz02KnfRVrAPq4vAPAWgWuNls002uS07q7Z');
        $line_items = [];

        foreach ($carts as $item) {

            $unit_amount = $item->discounted_total_price ? ($item->discounted_total_price / $item->quantity) : $item->price;
           
            


        $line_items[] = [
            'price_data' => [
                'currency' => 'vnd',
                'product_data' => [
                    'name' => $item->proName,
                    'images' => [$item->image_variant],
                ],
                'unit_amount' => $unit_amount*1,
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
            $order->payment_method = 'Credit_card';
            $order->shipment_status = 'ORDERPLACE';
            $order->order_status = 'PENDING';
            $order->save();

            foreach ($carts as $cart) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'pro_id' => $cart->pro_id,
                    'size_id' => $cart->size_id ?? null,
                    'color_id' => $cart->color_id ?? null,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                    'total_price' => $cart->discounted_total_price ?? ($cart->price * $cart->quantity),
                    'image' => $cart->image_variant,
                ]);
            }

           
            //cập nhật lại só lượng sau khi thanh toán thành công
            foreach ($carts as $cart) {
                if ($cart->size_id && $cart->color_id) {
                    $isVariant = DB::table('product_variants')
                        ->where('product_id', $cart->pro_id)
                        ->where('size_id', $cart->size_id)
                        ->where('color_id', $cart->color_id)
                        ->exists();
            
                    if ($isVariant) {
                        DB::table('product_variants')
                            ->where('product_id', $cart->pro_id)
                            ->where('size_id', $cart->size_id)
                            ->where('color_id', $cart->color_id)
                            ->decrement('quantity', $cart->quantity);
                    } else {
                        DB::table('products')
                            ->where('id', $cart->pro_id)
                            ->decrement('quantity', $cart->quantity);
                    }
                }
            }



            Mail::to($order->email)->send(new InvoiceMail(auth()->user(),$order));

            Notification::create([
                'type' => 'đã đặt hàng',
                'data' => json_encode([
                    'order_id' => $order->id,
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

            ClientsNotification::create([
                'user_id'=> auth()->user()->id,
                'type' => 'đã đặt hàng',
                'data' => json_encode([
                    'order_id' => $order->id,
                    'message' => 'Đã đặt hàng! Đơn hàng #' . $order->id . ',Vui lòng chờ xác nhận',
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
            // DB::table('carts')->where('user_id', auth()->user()->id)->delete();

            return redirect($session->url);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi tạo phiên thanh toán. Vui lòng thử lại.');
        }
    } elseif ($request->type_order === '2') {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->username = $validatedData['username'];
        $order->address = $validatedData['address'];
        $order->phone = $validatedData['phone'];
        $order->email = $validatedData['email'];
        $order->note = $validatedData['note'] ?? '';
        $order->payment_method = 'COD';
        $order->order_status = 'PENDING';
        $order->shipment_status = 'ORDERPLACE';
        $order->save();

        foreach ($carts as $cart) {
            OrderDetail::create([
                'order_id' => $order->id,
                'pro_id' => $cart->pro_id,
                'size_id' => $cart->size_id ?? null,
                'color_id' => $cart->color_id ?? null,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
                'total_price' => $cart->discounted_total_price ?? ($cart->price * $cart->quantity),
                'image' => $cart->image_variant,
            ]);
        }
 
        foreach ($carts as $cart) {
            if ($cart->size_id && $cart->color_id) {
                $isVariant = DB::table('product_variants')
                    ->where('product_id', $cart->pro_id)
                    ->where('size_id', $cart->size_id)
                    ->where('color_id', $cart->color_id)
                    ->exists();
        
                if ($isVariant) {
                    DB::table('product_variants')
                        ->where('product_id', $cart->pro_id)
                        ->where('size_id', $cart->size_id)
                        ->where('color_id', $cart->color_id)
                        ->decrement('quantity', $cart->quantity);
                } else {
                    DB::table('products')
                        ->where('id', $cart->pro_id)
                        ->decrement('quantity', $cart->quantity);
                }
            }
        }


        Mail::to($order->email)->send(new InvoiceMail(auth()->user(),$order));

        ClientsNotification::create([
            'user_id'=> auth()->user()->id,
            'type' => 'đã đặt hàng',
            'order_id' => $order->id,
            'data' => json_encode([
                'message' => 'Đã đặt hàng! Đơn hàng #' . $order->id . 'Vui lòng chờ xác nhận',
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

        Notification::create([
            'type' => 'đã đặt hàng',
            'order_id' => $order->id,
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

        return redirect()->route('order-success');
    }
}

public function clear(Request $request)
{
    // Xóa giỏ hàng của người dùng hiện tại
    DB::table('carts')->where('user_id', auth()->user()->id)->delete();

    // Chuyển hướng về trang chủ sau khi xóa giỏ hàng
    return redirect('/');
}
}




