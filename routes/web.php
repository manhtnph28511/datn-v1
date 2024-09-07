<?php

use App\Http\Controllers\Clients\AuthController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\SubCateController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\RatingController as AdminRatingController;


use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\SiteController;
use App\Http\Controllers\Clients\Users\ProfileController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\RatingController;
use App\Http\Controllers\Clients\HomeProductController;
use App\Http\Controllers\Clients\HomeCategoryController;
use App\Http\Controllers\Clients\OrderController as ClientsOrderController;
use App\Http\Controllers\Clients\OrderPlacedController;
use App\Http\Controllers\Clients\ClientsChatController;
use App\Http\Controllers\Clients\ClientsNotificationController;
use App\Http\Controllers\Clients\VoucherController as ClientsVoucherController;  
use App\Http\Controllers\Clients\UserVoucherController ; 
use App\Http\Controllers\Clients\WishlistsController ;
use App\Http\Controllers\Clients\ClientsBlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Auth Module
Route::name('account.')->prefix('tai-khoan')->controller(AuthController::class)->group(function () {
    //Login
    Route::match(['GET', 'POST'], 'dang-nhap', 'login')->name('login');

    Route::get('dang-nhap-form', 'showLoginForm')->name('loginForm'); // Thay đổi auth.loginForm thành account.loginForm

    //Register
    Route::match(['GET', 'POST'], 'dang-ky', 'register')->name('register');

    // Logout
    Route::get('dang-xuat', 'logout')->name('logout');

   // forgot
   Route::get('/password/forgot', function () {
            return view('clients.pages.auth.forgotpassword');
        })->name('password.request');

    Route::post('/password/forgot', [AuthController::class, 'forgotPassword'])->name('password.forgot');

    Route::get('/password/show', [AuthController::class, 'showPassword'])->name('password.show');
    Route::post('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');


    
});

// Admin
Route::prefix('dashboard')->middleware('isAdmin')->group(function () {
   
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
   

    //Product Module
    Route::name('admin.')->prefix('san-pham')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('product.index');
        Route::get('danh-sach-san-pham-da-xoa', 'trash')->name('product.trash');
        Route::match(['GET', 'POST'], 'them-moi', 'store')->name('product.store');
       
        Route::get('/show{id}', [ProductController::class, 'show'])->name('product.show');
        Route::match(['GET', 'POST'], 'cap-nhat/{id}', 'update')->name('product.update');
        Route::delete('xoa-mem/{id}', 'softDelete')->name('product.softDelete');
        Route::delete('xoa/{id}', 'destroy')->name('product.destroy');
        Route::get('khoi-khuc/{id}', 'restore')->name('product.restore');
        Route::get('search', 'search')->name('product.search');
    });

   
        //Variant
    Route::name('admin.')->prefix('variant')->controller(ProductVariantController::class)->group(function () {
        Route::get('product_variants/{product_id}', [ProductVariantController::class, 'index'])->name('variant.index');
        Route::get('product_variants/{product_id}/create', [ProductVariantController::class, 'create'])->name('variant.create');
        Route::post('product_variants/{product_id}', [ProductVariantController::class, 'store'])->name('variant.store');
        Route::delete('product_variants/{product_id}', [ProductVariantController::class, 'destroy'])->name('variant.destroy');
        Route::get('product_variants/{product_id}/edit/{variant_id}', [ProductVariantController::class, 'edit'])->name('variant.edit');
        Route::put('/products/{product_id}/variants/{variant_id}', [ProductVariantController::class, 'update'])->name('admin.variant.update');



    });
       

    //Brand Module
    Route::name('admin.')->prefix('thuong-hieu')->controller(BrandController::class)->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('brand.index');
        Route::get('thuong-hieu-da-xoa', [BrandController::class, 'trash'])->name('brand.trash');
        Route::get('them-moi', [BrandController::class, 'create'])->name('brand.create'); 
        Route::post('them-moi', [BrandController::class, 'store'])->name('brand.store'); 
        Route::match(['GET', 'POST'], 'cap-nhat/{id}', 'update')->name('brand.update');
        Route::get('khoi-phuc/{id}', 'restore')->name('brand.restore');
        Route::delete('xoa-mem/{id}', 'softDelete')->name('brand.softDelete');
        Route::delete('xoa/{id}', 'destroy')->name('brand.destroy');
        Route::get('search', 'search')->name('brand.search');
    });

    // Categories Module
    Route::name('admin.')->prefix('danh-muc')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('category.index');
        Route::get('danh-muc-da-xoa', 'trash')->name('category.trash');
        Route::get('khoi-phuc/{id}', 'restore')->name('category.restore');
        Route::match(['GET', 'POST'], 'them-moi', 'store')->name('category.store');
        Route::match(['GET', 'POST'], 'cap-nhat/{id}', 'update')->name('category.update');
        Route::delete('xoa-mem/{id}', 'softDelete')->name('category.softDelete');
        Route::delete('xoa/{id}', 'destroy')->name('category.destroy');


        // Sub Category Module
        Route::prefix('danh-muc-con')->controller(SubCateController::class)->group(function () {
            Route::get('trash-fashion', 'trashFashion')->name('cate.subcate.trashFashion');
            Route::get('trash-beauty', 'trashBeauty')->name('cate.subcate.trashBeauty');
            Route::get('trash-accessory', 'trashAccessory')->name('cate.subcate.trashAccessory');
            Route::get('restore/{id}', 'restore')->name('cate.subcate.restore');
            Route::match(['GET', 'POST'], 'them-moi', 'store')->name('cate.subcate.store');
            Route::match(['GET', 'POST'], 'cap-nhat/{id}', 'update')->name('cate.subcate.update');
            Route::delete('soft-delete/{id}', 'softDelete')->name('cate.subcate.softDelete');
            Route::delete('delete/{id}', 'softDelete')->name('cate.subcate.destroy');
        });
    });


//status_products
    Route::name('admin.')->prefix('status')->controller(StatusController::class)->group(function () {
        Route::get('/', 'index')->name('status.index');
        Route::get('search', [StatusController::class, 'search'])->name('status.search');
        Route::get('create', 'create')->name('status.create');    
        Route::post('store', 'store')->name('status.store');      
        Route::get('edit/{id}', 'edit')->name('status.edit');       
        Route::post('update/{id}', 'update')->name('status.update'); // Xử lý cập nhật trạng thá
        Route::delete('destroy/{id}', 'destroy')->name('status.destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('blogs', BlogController::class);
    });


    // Order Module
    Route::name('admin.')->prefix('order')->controller(OrderController::class)->group(function () {

        Route::get('/', 'index')->name('order.index');
        Route::get('{id}', 'show')->name('order.show');
        Route::get('dashboard/order/search', [OrderController::class, 'search'])->name('order.search');
        Route::post('/update-delivery-status', 'updateDeliveryStatus')->name('orders.update_delivery_status');
        Route::get('/invoice-download/{id}', 'downloadInvoice')->name('orders.downloadInvoice');
    });

    // OrderDetail Module
    Route::name('admin.')->prefix('orderdetail')->controller(OrderDetailController::class)->group(function () {
        Route::get('order-details', 'index')->name('orderdetail.index');
        Route::get('order-details/{id}', 'show')->name('orderdetail.show');

    });



    //Attribute Module
    Route::name('admin.')->prefix('attribute')->group(function () {
        Route::get('/', [AttributeController::class, 'index'])->name('att.index');

        //Size Module
        Route::prefix('size')->controller(SizeController::class)->group(function () {
            Route::get('/', 'index')->name('att.size.index');
            Route::get('detail/{id}', 'show')->name('att.size.show');
            Route::match(['GET', 'POST'], 'them-moi', 'store')->name('att.size.store');
            Route::match(['GET', 'POST'], 'cap-nhat/{id}', 'update')->name('att.size.update');
            Route::delete('xoa/{id}', 'destroy')->name('att.size.destroy');
        });

        //Color Module
        Route::prefix('color')->controller(ColorController::class)->group(function () {
            Route::match(['GET', 'POST'], 'them-moi', 'store')->name('att.color.store');
            Route::match(['GET', 'POST'], 'cap-nhat/{id}', 'update')->name('att.color.update');
            Route::delete('xoa/{id}', 'destroy')->name('att.color.destroy');
        });
    });


    //User - Admin
    Route::prefix('manage')->controller(ManageController::class)->group(function () {
        Route::get('/', 'index')->name('admin.manage.index');
        Route::get('/create', 'create')->name('admin.manage.create');
        Route::post('/', 'store')->name('admin.manage.store');
        Route::get('/search', 'search')->name('admin.manage.search');
        Route::delete('/{id}', 'destroy')->name('admin.manage.destroy');
        Route::get('/trashed', 'trashed')->name('admin.manage.trashed'); // Route để xem các tài khoản đã bị xóa
        Route::patch('/restore/{id}', 'restore')->name('admin.manage.restore'); // Route để khôi phục tài khoản
        Route::get('manage/{id}/edit', 'edit')->name('admin.manage.edit');
        Route::put('manage/{id}', 'update')->name('admin.manage.update');
        Route::delete('/manage/force-delete/{id}', 'forceDelete')->name('admin.manage.forceDelete');

    });

    Route::prefix('customer')->controller(CustomerController::class)->group(function () {
        Route::get('/', 'index')->name('admin.customer.index');
        Route::get('search', 'search')->name('admin.customer.search');
        Route::get('activate/{id}', 'activate')->name('admin.customer.activate');
        Route::get('deactivate/{id}', 'deactivate')->name('admin.customer.deactivate');
    });



    Route::name('admin.')->prefix('notifications')->controller(NotificationController::class)->group(function () {
        Route::get('/', 'showNotifications')->name('notifications.index');
        Route::post('/notifications/{notification}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-as-read');
        Route::delete('/notifications/{notification}', [NotificationController::class, 'delete'])->name('notifications.delete');

    });

    Route::name('admin.')->prefix('vouchers')->controller(VoucherController::class)->group(function () {
        Route::get('/', 'index')->name('vouchers.index');
        Route::get('/create', 'create')->name('vouchers.create');
        Route::post('/', 'store')->name('vouchers.store');
        Route::get('vouchers/{id}/edit', 'edit')->name('vouchers.edit');
        Route::put('vouchers/{id}', 'update')->name('vouchers.update');
        Route::delete('vouchers/{id}', 'destroy')->name('vouchers.destroy');
    });

    Route::name('admin.')->prefix('chats')->controller(ChatController::class)->group(function () {
        Route::get('/chats/{userId?}', [ChatController::class, 'index'])->name('chats.index');
        Route::get('/show/{userId}', [ChatController::class, 'show'])->name('chats.show');
        Route::post('/chats/send/{userId}', [ChatController::class, 'sendMessage'])->name('chats.sendMessage');

        
        Route::delete('/chats/{id}/delete-message-and-file', [ChatController::class, 'deleteMessageAndFile'])
     ->name('chats.deleteMessageAndFile');

    });

    Route::name('admin.')->prefix('ratings')->controller(AdminRatingController::class)->group(function () {
        Route::get('/', 'index')->name('ratings.index');
        Route::delete('/{id}', 'destroy')->name('ratings.destroy');
    });


});







// Clients

Route::get('/', [HomeController::class, 'home'])->name('home-client');
Route::post('/search/name', [HomeController::class, 'searchByName'])->name('home-client.search.name');










Route::controller(SiteController::class)->group(function () {
    //About page
    Route::get('about', 'about')->name('home.site.about');
    Route::get('contact', 'contact')->name('home.site.contact');
});




// Product
Route::controller(HomeProductController::class)->group(function () {
    Route::get('product/{id}', 'showProduct')->name('home.site.product.show');
    Route::get('shop-page', 'shop')->name('home.site.product.shop');
    Route::post('searchByPrice', 'searchByPrice')->name('home.site.product.searchByPrice');
    Route::get('product-from-sub-cate/{id}', 'productFromSubCate')->name('home.site.product.proFromSubCate');
    Route::post('search-query', 'searchProductHome')->name('home.site.product.search');

});

// Category
Route::controller(HomeCategoryController::class)->group(function () {
    Route::get('cate-detail/{id}', 'detailCate')->name('home.site.cate.detail');
    
});

// Rating
Route::controller(RatingController::class)->middleware('rating')->group(function () {
    Route::post('rating', 'rating')->name('home.rating.store');
    Route::delete('delete/{rating}', 'destroy')->name('home.rating.destroy');
});

// Cart Module
Route::middleware('auth')->prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('/', 'cart')->name('home.cart');
    Route::post('add-to-card', 'addToCart')->name('home.cart.addToCart');
    Route::post('update-card', 'updateCart')->name('home.cart.updateCart');
    Route::get('checkout', 'checkout')->name('home.cart.checkout');
    Route::post('checkout-step', 'checkoutStep')->name('home.cart.checkout-step');
    Route::get('delete/{id}', 'destroy')->name('home.cart.destroy');
    Route::get('order-success', 'success')->name('home.cart.order-success');
    Route::view('success', 'clients.pages.orders.order-success')->name('order-success');


    Route::get('voucher', 'voucher')->name('home.cart.voucher');
    Route::get('search-vouchers', 'searchVouchers')->name('clients.search-vouchers');
    Route::post('applyVoucher', [CartController::class, 'applyVoucher'])->name('applyVoucher');
   

    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

   
    


});


// Profile
Route::middleware('auth')->prefix('profile')->controller(ProfileController::class)->group(function () {
    Route::match(['GET', 'POST'], '/', 'profile')->name('clients.profile');
    Route::get('/index', [ProfileController::class, 'index'])->name('clients.index');
});

// Order History
Route::middleware('auth')->name('order.')->prefix('order')->controller(ClientsOrderController::class)->group(function () {
    Route::get('/history', 'history')->name('history');
    # order tracking
    Route::get('/track', 'track')->name('track');
    #review
});



//thông báo
Route::name('clients.')->prefix('notification')->controller(ClientsNotificationController::class)->group(function () {
    Route::get('/notifications', 'index')->name('notifications.index');
    
    Route::delete('/notifications/{id}', 'delete')->name('notifications.delete');
    Route::post('/notifications/{id}/confirm-received', 'confirmReceived')->name('notifications.confirmReceived');
    Route::post('/notifications/{id}/cancel-order', 'cancelOrder')->name('notifications.cancelOrder');
  
    Route::get('/product/review/{orderId}/{productId}', [ClientsNotificationController::class, 'review'])->name('product.review');


   
});




Route::prefix('clients')->name('clients.')->namespace('Clients')->group(function () {
    Route::get('/chats/{userId?}', [ClientsChatController::class, 'index'])->name('chats.index');
    Route::post('/chats/send', [ClientsChatController::class, 'send'])->name('chats.send');
    Route::delete('/chats/{id}/delete-message-and-file', [ClientsChatController::class, 'deleteMessageAndFile'])
     ->name('chats.deleteMessageAndFile');
});





//voucher
Route::prefix('clients')->name('clients.')->group(function () {
    Route::get('/voucher', [ClientsVoucherController::class, 'index'])->name('vouchers.index');
    Route::post('/voucher/{voucherId}/save/{id}', [ClientsVoucherController::class, 'saveVoucher'])->name('vouchers.save');
});




Route::prefix('clients')->name('clients.')->group(function () {
    Route::get('/user/vouchers', [UserVoucherController::class, 'userVouchers'])->name('users.vouchers');
});



//sp yêu thích
Route::name('clients.')->prefix('wishlists')->group(function () {
    Route::get('/wishlist', [WishlistsController::class, 'show'])->name('users.wishlists');
    Route::post('/wishlist/add', [WishlistsController::class, 'addToWishlist'])->name('wishlists.add');
    Route::post('/wishlist/remove/{id}', [WishlistsController::class, 'removeFromWishlist'])->name('remove');
});



Route::name('clients.')->prefix('ratings')->controller(RatingController::class)->group(function () {
    Route::get('clients/ratings', [RatingController::class, 'index'])->name('ratings.index');
    Route::delete('ratings/{id}', [RatingController::class, 'destroy'])->name('ratings.destroy');
    Route::get('ratings/{id}/edit', [RatingController::class, 'edit'])->name('ratings.edit');
    Route::put('ratings/{id}', [RatingController::class, 'update'])->name('ratings.update');
});

Route::name('clients.')->prefix('blogs')->controller(ClientsBlogController::class)->group(function () {
    Route::get('/', [ClientsBlogController::class, 'index'])->name('blogs.index');
    Route::get('/{id}', [ClientsBlogController::class, 'show'])->name('blogs.show');
   
});




