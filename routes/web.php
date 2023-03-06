<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderViewController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\UserProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [FrontendController::class, 'index']);
Route::get('/search', [FrontendController::class, 'searchProducts']);
Route::get('/new-arrivals', [FrontendController::class, 'newArrivals']);
Route::get('/featured-products', [FrontendController::class, 'featuredProducts']);

Route::get('/collections', [FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [FrontendController::class, 'productView']);

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/checkout', [CheckoutController::class, 'index']);
    // Route::get('/place_order', [CheckoutController::class, 'placeOrder']);
    Route::get('/thank-you', [FrontendController::class, 'thankYou']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{orderId}', [OrderController::class, 'show']);

    Route::get('/profile', [UserProfileController::class, 'index']);
    Route::post('/profile/update', [UserProfileController::class, 'updateUserDetails'])->name('profile.update');
    Route::post('/profile/update/password', [UserProfileController::class, 'updateUserPassword'])->name('profile.update.password');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Category Route
    Route::resource('categories', CategoryController::class);

    // Brand Route
    Route::resource('brands', BrandsController::class);

    // Product Route
    Route::resource('products', ProductController::class);
    Route::get('products/image/{product_image_id}/delete', [ProductController::class, 'destroyImage'])->name('products.image.delete');

    // Color Route
    Route::resource('colors', ColorController::class);

    // Product Color Update Quantity
    Route::post('/product-color/{product_color_id}', [ProductController::class, 'updateProductColorQty']);

    // Product Color Delete
    Route::get('/product-color/{product_color_id}/delete', [ProductController::class, 'deleteProductColor']);

    // Slider Route
    Route::resource('sliders', SliderController::class);

    Route::get('/orders', [OrderViewController::class, 'index']);
    Route::get('/orders/{order_id}', [OrderViewController::class, 'show']);
    Route::put('/orders/{order_id}', [OrderViewController::class, 'updateOrderStatus']);
    // Invoice Routes
    Route::get('/invoice/{order_id}/generate', [OrderViewController::class, 'generateInvoice']);
    Route::get('/invoice/{order_id}', [OrderViewController::class, 'viewInvoice']);
    Route::get('/invoice/{order_id}/mail', [OrderViewController::class, 'mailInvoice']);

    // Site Settings
    Route::get('settings', [SettingController::class, 'index'])->name('site_settings');
    Route::post('settings', [SettingController::class, 'store'])->name('site_settings');

    Route::resource('users', UserController::class);
    Route::get('users/{userId}/destroy', [UserController::class, 'destroy']);
});
