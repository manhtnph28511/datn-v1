<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Notification;
use App\Models\User;
use App\Models\Voucher;
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

    // public function addToCart(Request $request)
    // {
    //     if (!$request->has('pro_id')) {
    //         toast()->error('Lỗi');
    //         return back();
    //     }
    
    //     if (Auth::check()) {
    //         // if (Auth::user()->role !== 1) {
    //             $proId = $request->get('pro_id');
    //             $productToCart = Product::find($proId);
    
    //             if (!$productToCart) {
    //                 toast()->error('Sản phẩm không tồn tại');
    //                 return back();
    //             }
    
    //             if ($request->quantity > $productToCart->quantity) {
    //                 toast()->error('Số lượng sản phẩm không hợp lệ');
    //                 return back();
    //             }
    
    //             // Lấy giá từ yêu cầu
    //             $price = $request->input('price');
    //             if (is_null($price)) {
    //                 $price = $productToCart->price;
    //             }
    
    //             try {
    //                 $isSuccess = Cart::create([
    //                     'pro_id' => $proId,
    //                     'user_id' => Auth::user()->id,
    //                     'size_id' => $request->input('size_id'),
    //                     'color_id' => $request->input('color_id'),
    //                     'price' => $price,
    //                     'quantity' => $request->input('quantity'),
    //                     'total_price' => ($price * $request->input('quantity'))
    //                 ]);
    
    //                 return checkEndDisplayMsg('success', $isSuccess, 'Thành công', 'Thêm giỏ hàng thành công', 'home.cart');
    //             } catch (\Throwable $th) {
    //                 return $th->getMessage();
    //             }
    //         // }
    //         return back();
    //     }
    //     return back();
    // }
    
//     public function addToCart(Request $request)
// {
//     // Kiểm tra xem yêu cầu có chứa 'pro_id' không
//     if (!$request->has('pro_id')) {
//         toast()->error('Lỗi');
//         return back();
//     }

//     // Kiểm tra xem người dùng đã đăng nhập chưa
//     if (Auth::check()) {
//         $proId = $request->get('pro_id');
//         $colorId = $request->get('color_id');
//         $sizeId = $request->get('size_id');

//         // Kiểm tra sự tồn tại của sản phẩm với color_id và size_id
//         $productToCart = Product::where('id', $proId)
//                                 ->where('color_id', $colorId)
//                                 ->where('size_id', $sizeId)
//                                 ->first();

//         if (!$productToCart) {
//             toast()->error('Sản phẩm với biến thể này không tồn tại');
//             return back();
//         }

//         // Kiểm tra số lượng yêu cầu có hợp lệ không
//         if ($request->quantity > $productToCart->quantity) {
//             toast()->error('Số lượng sản phẩm không hợp lệ');
//             return back();
//         }

//         // Lấy giá từ yêu cầu, nếu không có thì lấy giá của sản phẩm
//         $price = $request->input('price');
//         if (is_null($price)) {
//             $price = $productToCart->price;
//         }

//         try {
//             // Thêm sản phẩm vào giỏ hàng
//             $isSuccess = Cart::create([
//                 'pro_id' => $proId,
//                 'user_id' => Auth::user()->id,
//                 'size_id' => $sizeId,
//                 'color_id' => $colorId,
//                 'price' => $price,
//                 'quantity' => $request->input('quantity'),
//                 'total_price' => ($price * $request->input('quantity'))
//             ]);

//             // Hiển thị thông báo thành công
//             return checkEndDisplayMsg('success', $isSuccess, 'Thành công', 'Thêm giỏ hàng thành công', 'home.cart');
//         } catch (\Throwable $th) {
//             return $th->getMessage();
//         }
//     }
    
//     // Nếu người dùng chưa đăng nhập, trả về trang trước
//     return back();
// }

// public function addToCart(Request $request)
// {
//     // Kiểm tra xem yêu cầu có chứa 'pro_id' không
//     if (!$request->has('pro_id')) {
//         toast()->error('Lỗi');
//         return back();
//     }

//     // Kiểm tra xem người dùng đã đăng nhập chưa
//     if (Auth::check()) {
//         $proId = $request->get('pro_id');
//         $colorId = $request->get('color_id');
//         $sizeId = $request->get('size_id');
//         $quantity = $request->input('quantity', 1);

//         // Lấy sản phẩm và biến thể của sản phẩm
//         $product = Product::with('product_variants')->find($proId);

//         if (!$product) {
//             toast()->error('Sản phẩm không tồn tại');
//             return back();
//         }

//         if (!$colorId || !$sizeId) {
//             return redirect()->back()->withErrors(['error' => 'Vui lòng chọn kích thước và màu sắc.']);
//         }

//         // Kiểm tra nếu người dùng chọn kích thước và màu sắc
//         if ($sizeId && $colorId) {
//             // Kiểm tra biến thể
//             $variant = $product->product_variants->first(function ($variant) use ($sizeId, $colorId) {
//                 return $variant->size_id == $sizeId && $variant->color_id == $colorId;
//             });

//             if ($variant) {
//                 // Kiểm tra số lượng biến thể
//                 if ($quantity > $variant->quantity) {
//                     toast()->error('Số lượng yêu cầu vượt quá số lượng có sẵn');
//                     return back();
//                 }

//                 // Lấy giá biến thể nếu có
//                 $price = $variant->price;
//             } else {
//                 toast()->error('Biến thể sản phẩm không tồn tại');
//                 return back();
//             }
//         } else {
//             // Kiểm tra sản phẩm chính nếu không có biến thể
//             if ($product->size_id == $sizeId && $product->color_id == $colorId) {
//                 if ($quantity > $product->quantity) {
//                     toast()->error('Số lượng yêu cầu vượt quá số lượng có sẵn');
//                     return back();
//                 }

//                 // Lấy giá sản phẩm chính
//                 $price = $product->price;
//             } else {
//                 toast()->error('Sản phẩm không tồn tại với kích thước và màu sắc này');
//                 return back();
//             }
//         }

//         try {
//             // Thêm sản phẩm vào giỏ hàng
//             $isSuccess = Cart::create([
//                 'pro_id' => $proId,
//                 'user_id' => Auth::user()->id,
//                 'size_id' => $sizeId,
//                 'color_id' => $colorId,
//                 'price' => $price,
//                 'quantity' => $quantity,
//                 'total_price' => ($price * $quantity)
//             ]);

//             // Hiển thị thông báo thành công
//             return checkEndDisplayMsg('success', $isSuccess, 'Thành công', 'Thêm giỏ hàng thành công', 'home.cart');
//         } catch (\Throwable $th) {
//             toast()->error('Đã xảy ra lỗi: ' . $th->getMessage());
//             return back();
//         }
//     }
    
//     // Nếu người dùng chưa đăng nhập, trả về trang trước
//     return back();
// }

public function addToCart(Request $request)
{
    // Kiểm tra xem yêu cầu có chứa 'pro_id' không
    if (!$request->has('pro_id')) {
        toast()->error('Lỗi');
        return back();
    }

    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (Auth::check()) {
        $proId = $request->get('pro_id');
        $colorId = $request->get('color_id');
        $sizeId = $request->get('size_id');
        $quantity = $request->input('quantity', 1);

        // Lấy sản phẩm và biến thể của sản phẩm
        $product = Product::with('product_variants')->find($proId);

        if (!$product) {
            toast()->error('Sản phẩm không tồn tại');
            return back();
        }

        // Nếu chưa chọn kích thước hoặc màu sắc, hiển thị thông báo lỗi
        if (!$colorId || !$sizeId) {
            return redirect()->back()->withErrors(['error' => 'Vui lòng chọn kích thước và màu sắc.']);
        }

        // Kiểm tra nếu người dùng chọn kích thước và màu sắc
        if ($sizeId && $colorId) {
            // Kiểm tra biến thể
            $variant = $product->product_variants->first(function ($variant) use ($sizeId, $colorId) {
                return $variant->size_id == $sizeId && $variant->color_id == $colorId;
            });

            if ($variant) {
                // Kiểm tra số lượng biến thể
                if ($quantity > $variant->quantity) {
                    toast()->error('Số lượng yêu cầu vượt quá số lượng có sẵn');
                    return back();
                }

                // Lấy giá biến thể nếu có
                $price = $variant->price;
            } else {
                // Nếu không có biến thể phù hợp, kiểm tra giá của sản phẩm chính
                if ($product->size_id == $sizeId && $product->color_id == $colorId) {
                    if ($quantity > $product->quantity) {
                        toast()->error('Số lượng yêu cầu vượt quá số lượng có sẵn');
                        return back();
                    }

                    // Lấy giá sản phẩm chính
                    $price = $product->price;
                } else {
                    toast()->error('Biến thể sản phẩm không tồn tại');
                    return back();
                }
            }
        } else {
            // Nếu chưa chọn kích thước và màu sắc
            toast()->error('Vui lòng chọn kích thước và màu sắc.');
            return back();
        }

        try {
            // Thêm sản phẩm vào giỏ hàng
            $isSuccess = Cart::create([
                'pro_id' => $proId,
                'user_id' => Auth::user()->id,
                'size_id' => $sizeId,
                'color_id' => $colorId,
                'price' => $price,
                'quantity' => $quantity,
                'total_price' => ($price * $quantity)
            ]);

            // Hiển thị thông báo thành công
            return checkEndDisplayMsg('success', $isSuccess, 'Thành công', 'Thêm giỏ hàng thành công', 'home.cart');
        } catch (\Throwable $th) {
            toast()->error('Đã xảy ra lỗi: ' . $th->getMessage());
            return back();
        }
    }
    
    // Nếu người dùng chưa đăng nhập, trả về trang trước
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





    //voucher
    // public function applyVoucher(Request $request)
    // {
    //     // Xác thực dữ liệu yêu cầu
    //     $request->validate([
    //         'voucher_code' => 'required|string',
    //         'pro_id' => 'required|integer|exists:products,id',
    //         'total_price' => 'required|numeric',
    //     ]);

    //     // Tìm giỏ hàng của người dùng với sản phẩm cụ thể
    //     $cart = Cart::where('user_id', auth()->id())->where('pro_id', $request->input('pro_id'))->first();

    //     if (!$cart) {
    //         return back()->withErrors(['error' => 'Sản phẩm không có trong giỏ hàng.']);
    //     }

    //     // Lấy thông tin sản phẩm từ cơ sở dữ liệu
    //     $product = Product::find($cart->pro_id);

    //     if (!$product) {
    //         return back()->withErrors(['error' => 'Sản phẩm không tồn tại.']);
    //     }

    //     // Lấy giá của sản phẩm
    //     $product_price = $product->price;

    //     // Lấy voucher từ mã voucher
    //     $voucher = Voucher::where('code', $request->input('voucher_code'))->first();

    //     // Kiểm tra xem voucher có tồn tại và còn hạn sử dụng không
    //     if (!$voucher || $voucher->expires_at < now()) {
    //         return back()->withErrors(['error' => 'Voucher không hợp lệ hoặc đã hết hạn.']);
    //     }

    //     // Kiểm tra xem voucher có áp dụng cho sản phẩm này không
    //     if (!$voucher->products->contains($product->id)) {
    //         return back()->withErrors(['error' => 'Voucher không áp dụng cho sản phẩm này.']);
    //     }

    //     // Tính toán giảm giá
    //     $discountAmount = 0;
    //     if ($voucher->discount_type == 'percentage') {
    //         $discountAmount = ($product_price * $voucher->discount) / 100;
    //     } else if ($voucher->discount_type == 'fixed') {
    //         $discountAmount = $voucher->discount;
    //     }

    //     // Nếu giảm giá lớn hơn tổng giá, đặt tổng tiền sau giảm giá là 0
    //     $discounted_total_price = max($product_price - $discountAmount, 0);

    //     // Cập nhật giỏ hàng với số tiền sau giảm giá
    //     $cart->update([
    //         'discounted_total_price' => $discounted_total_price,
    //     ]);

    //     return view('clients.pages.cart', [
    //         'cart' => $cart,
    //         'discounted_total_price' => $discounted_total_price,
    //         'success' => 'Voucher đã được áp dụng thành công.'
    //     ]);
    // }
    



    
    





    
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
    


    

    




//     public function checkoutStep(Request $request)
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

//     $carts = DB::table('carts')
//         ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
//         ->where('carts.user_id', auth()->user()->id)
//         ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'carts.price')
//         ->get();

//     if ($request->type_order === '1') {
//         $stripe = new \Stripe\StripeClient('sk_test_51OCaeXJEiz1nZ8wauNXZTuCnNk3n6JOPOeucvWgKw0mYqTY6UswavZHHhoa9PKzzz02KnfRVrAPq4vAPAWgWuNls002uS07q7Z');
//         $line_items = [];

//         foreach ($carts as $item) {
//             $line_items[] = [
//                 'price_data' => [
//                     'currency' => 'vnd',
//                     'product_data' => [
//                         'name' => $item->proName,
//                         'images' => [$item->image],
//                     ],
//                     'unit_amount' => $item->discounted_total_price * 1,
//                 ],
//                 'quantity' => $item->quantity,
//             ];
//         }

//         try {
//             $session = $stripe->checkout->sessions->create([
//                 'payment_method_types' => ['card'],
//                 'line_items' => $line_items,
//                 'mode' => 'payment',
//                 'success_url' => route('order-success'),
//                 'cancel_url' => route('home.cart'),
//             ]);

//             $order = new Order();
//             $order->user_id = auth()->user()->id;
//             $order->username = $validatedData['username'];
//             $order->address = $validatedData['address'];
//             $order->phone = $validatedData['phone'];
//             $order->email = $validatedData['email'];
//             $order->note = $validatedData['note'] ?? '';
//             $order->payment_method =  'Credit_card' ;
//             $order->shipment_status = 'PACKED';
//             $order->order_status = "PENDING";
//             $order->save();

//             foreach ($carts as $cart) {
//                 OrderDetail::create([
//                     'order_id' => $order->id,
//                     'pro_id' => $cart->pro_id,
//                     'size_id' => $cart->size_id ?? null,
//                     'color_id' => $cart->color_id ?? null,
//                     'price' => $cart->price,
//                     'quantity' => $cart->quantity,
//                     'total_price' => $cart->discounted_total_price ?? $cart->price * $cart->quantity,

//                 ]);
//             }

//             // Mail::to($order->email)->send(new InvoiceMail(auth()->user(),$order));


//             Notification::create([
//                 'type' => 'đã đặt hàng',
//                 'order_id' =>  $order->id,
//                 'data' => json_encode([
//                     'message' => 'Có đơn hàng mới! Đơn hàng #' . $order->id,
//                     'order_details' => [
//                         'username' => $order->username,
//                         'address' => $order->address,
//                         'phone' => $order->phone,
//                         'email' => $order->email,
//                         'note' => $order->note,
//                     ]
//                 ]),
//                 'is_read' => false,
//             ]);

//             session()->put('order_id', $order->id);
//             DB::table('carts')->where('user_id', auth()->user()->id)->delete();

//             return redirect($session->url);
//         } catch (\Exception $e) {
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
//         $order->payment_method = 'COD';
//         $order->order_status = "PENDING";
//         $order->shipment_status = 'ORDERPLACE';
//         $order->save();

//         foreach ($carts as $cart) {
//             OrderDetail::create([
//                 'order_id' => $order->id,
//                 'pro_id' => $cart->pro_id,
//                 'size_id' => $cart->size_id ?? null,
//                 'color_id' => $cart->color_id ?? null,
//                 'price' => $cart->price,
//                 'quantity' => $cart->quantity,
//                 'total_price' => $cart->discounted_total_price ?? $cart->price * $cart->quantity,

//             ]);
//         }

//         // Mail::to($order->email)->send(new InvoiceMail(auth()->user(),$order));


//         Notification::create([
//             'type' => 'đã đặt hàng',
//             'order_id' =>  $order->id,
//             'data' => json_encode([
//                 'message' => 'Có đơn hàng mới! Đơn hàng #' . $order->id,
//                 'order_details' => [
//                     'username' => $order->username,
//                     'address' => $order->address,
//                     'phone' => $order->phone,
//                     'email' => $order->email,
//                     'note' => $order->note,
//                 ]
//             ]),
//             'is_read' => false,
//         ]);



//         DB::table('carts')->where('user_id', auth()->user()->id)->delete();


//         // $this->sendOrderNotification($order);

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

    // Lấy danh sách sản phẩm trong giỏ hàng
    $carts = DB::table('carts')
        ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
        ->where('carts.user_id', auth()->user()->id)
        ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'carts.price', 'carts.discounted_total_price')
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
            $line_items[] = [
                'price_data' => [
                    'currency' => 'vnd',
                    'product_data' => [
                        'name' => $item->proName,
                        'images' => [$item->image],
                    ],
                    'unit_amount' => $item->discounted_total_price ?? ($item->price * $item->quantity),
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
            $order->shipment_status = 'PACKED';
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
                ]);
            }

           
            //cập nhật lại só lượng sau khi thanh toán thành công
            if ($cart->size_id && $cart->color_id) {
                // Nếu có biến thể (size_id và color_id)
                DB::table('product_variants')
                    ->where('id', $cart->size_id)
                    ->decrement('quantity', $cart->quantity);
            } else {
                // Nếu không có size_id, chỉ giảm số lượng sản phẩm
                DB::table('products')
                    ->where('id', $cart->pro_id)
                    ->decrement('quantity', $cart->quantity);
            }



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

            session()->put('order_id', $order->id);
            // DB::table('carts')->where('user_id', auth()->user()->id)->delete();

            return redirect($session->url);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi tạo phiên thanh toán. Vui lòng thử lại.');
        }
    } elseif ($request->type_order === '2') {
        // Thanh toán khi nhận hàng
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
            ]);
        }
 
        //cập nhật số lượng sau khi đặt hàng thành công
        if ($cart->size_id && $cart->color_id) {
            // Nếu có biến thể (size_id và color_id)
            DB::table('product_variants')
                ->where('id', $cart->size_id)
                ->decrement('quantity', $cart->quantity);
        } else {
            // Nếu không có size_id, chỉ giảm số lượng sản phẩm
            DB::table('products')
                ->where('id', $cart->pro_id)
                ->decrement('quantity', $cart->quantity);
        }

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

}



