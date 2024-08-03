<?php

use App\Http\Controllers\Clients\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Clients\OrderPlacedController;
use App\Http\Controllers\Admin\SubCateController;
use App\Http\Controllers\Clients\SiteController;
use App\Http\Controllers\Clients\Users\ProfileController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\RatingController;
use App\Http\Controllers\Clients\HomeProductController;
use App\Http\Controllers\Clients\HomeCategoryController;


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
        Route::match(['GET', 'POST'], 'cap-nhat/{id}', 'update')->name('product.update');
        Route::delete('xoa-mem/{id}', 'softDelete')->name('product.softDelete');
        Route::delete('xoa/{id}', 'destroy')->name('product.destroy');
        Route::get('khoi-khuc/{id}', 'restore')->name('product.restore');
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
        Route::get('/{id}', 'show')->name('order.show');
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
    Route::prefix('customer')->controller(CustomerController::class)->group(function () {
        Route::get('/', 'index')->name('admin.customer.index');
        Route::match(['GET', 'POST'], 'edit/{id}', 'update')->name('admin.customer.update');
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
Route::middleware('addToCart')->prefix('cart')->controller(CartController::class)->group(function () {
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
});
//