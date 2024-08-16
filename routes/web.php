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
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\SubCateController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\VoucherController;


use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\SiteController;
use App\Http\Controllers\Clients\Users\ProfileController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\RatingController;
use App\Http\Controllers\Clients\HomeProductController;
use App\Http\Controllers\Clients\HomeCategoryController;
use App\Http\Controllers\Clients\OrderController as ClientsOrderController;
use App\Http\Controllers\Clients\OrderPlacedController;
use Illuminate\Notifications\Notification;
use App\Http\Controllers\Clients\NotificationController as ClientsNotificationController;

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

    Route::match(['GET', 'POST'], 'forgotpassword', 'forgot')->name('forgotpassword');
    Route::match(['GET', 'POST'], 'resetpassword', 'reset')->name('password.reset');


});

// Admin
Route::prefix('dashboard')->middleware('isAdmin')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin');

    //Product Module
    Route::name('admin.')->prefix('san-pham')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('product.index');
        Route::get('danh-sach-san-pham-da-xoa', 'trash')->name('product.trash');
        Route::match(['GET', 'POST'], 'them-moi', 'store')->name('product.store');
        // Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.product.create');
        // Route::post('admin/products', [ProductController::class, 'store'])->name('admin.product.store');
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
            Route::put('product_variants/{product_id}/update/{variant_id}', [ProductVariantController::class, 'update'])->name('variant.update');
        });


    //Brand Module
    Route::name('admin.')->prefix('thuong-hieu')->controller(BrandController::class)->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('brand.index');
        Route::get('thuong-hieu-da-xoa', [BrandController::class, 'trash'])->name('brand.trash');
        Route::match(['GET', 'POST'], 'them-moi', 'store')->name('brand.store');
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


    // Order Module
    Route::name('admin.')->prefix('order')->controller(OrderController::class)->group(function () {

        Route::get('/', 'index')->name('order.index');
        Route::get('{id}', 'show')->name('order.show');
        Route::get('dashboard/order/search', [OrderController::class, 'search'])->name('order.search');
        Route::post('/update-delivery-status', 'updateDeliveryStatus')->name('orders.update_delivery_status');
        Route::get('/invoice-download/{id}', 'downloadInvoice')->name('orders.downloadInvoice');
        // Route::post('/update-payment-status', 'updatePaymentStatus')->name('orders.update_payment_status');
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



});







// Clients
Route::get('/', [HomeController::class, 'home'])->name('home-client');

Route::controller(SiteController::class)->group(function () {
    //About page
    Route::get('about', 'about')->name('home.site.about');
    // Blog page
    Route::get('blog', 'blog')->name('home.site.blog');
    // Contact page
    Route::get('contact', 'contact')->name('home.site.contact');
});


// Product
Route::controller(HomeProductController::class)->group(function () {
    Route::get('product/{id}/{slug?}', 'showProduct')->name('home.site.product.show');
    Route::get('shop-page', 'shop')->name('home.site.product.shop');
    Route::get('product-from-sub-cate/{id}', 'productFromSubCate')->name('home.site.product.proFromSubCate');
    //Search product
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
Route::name('clients.')->prefix('notification')->controller(ClientsNotificationController::class)->group(function () {
    Route::get('/notifications', 'index')->name('notifications.index');
    Route::post('/notifications/{id}/read', 'markAsRead')->name('notifications.markAsRead');
    Route::delete('/notifications/{id}', 'delete')->name('notifications.delete');
    Route::post('/notifications/{id}/confirm-received', [ClientsNotificationController::class, 'confirmReceived'])->name('notifications.confirmReceived');
});
