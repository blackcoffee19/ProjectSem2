<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserProductDetailController;
use App\Http\Controllers\User\UserWishlistController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserAccountController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminReviewController;

// Route::get('/', function () {
//     return view('welcome');
// });


// =============== ROUTE USER =============== //
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/category', [UserProductController::class, 'index'])->name('products');

Route::get('/product-detail', [UserProductDetailController::class, 'index'])->name('products-details');

Route::get('/wishlist', [UserWishlistController::class, 'index'])->name('wishlist');

Route::get('/order', [UserOrderController::class, 'index'])->name('order');

Route::get('/account/accorder', [UserAccountController::class, 'Orders'])->name('accountorder');
Route::get('/account/setting', [UserAccountController::class, 'Settings'])->name('setting');
Route::get('/account/address', [UserAccountController::class, 'Address'])->name('address');
Route::get('/account/payment', [UserAccountController::class, 'PaymentMethod'])->name('payment');



// =============== END ROUTE USER =============== //


// =============== ROUTE ADMIN =============== //

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

Route::prefix('/admin/category')->group(function () {
    Route::get('/', [AdminCategoryController::class, 'index'])->name('adminCategories');
    Route::get('/find-by-name', [AdminCategoryController::class, 'findByName'])->name('category.findByName');
    Route::get('/create', [AdminCategoryController::class, 'create'])->name('adminAddCategories');
    Route::post('/store', [AdminCategoryController::class, 'store'])->name('adminStoreCategories');
    Route::get('/detail/{id_type}', [AdminCategoryController::class, 'show'])->name('adminShowCategory');
    Route::get('/edit/{id_type}', [AdminCategoryController::class, 'edit'])->name('adminEditCategory');
    Route::put('/update/{id_type}', [AdminCategoryController::class, 'update'])->name('adminUpdateCategory');
    Route::delete('/delete/{id_type}', [AdminCategoryController::class, 'delete'])->name('adminDeleteCategory');
});

Route::prefix('/admin/products')->group(function () {
    Route::get('/', [AdminProductController::class, 'index'])->name('adminProduct');
    Route::get('/create', [AdminProductController::class, 'create'])->name('adminAddProduct');
    // Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('adminEditProduct');
    // Route::post('/update', [AdminProductController::class, 'update'])->name('adminUpdateProduct');
    // Route::post('/delete', [AdminProductController::class, 'delete'])->name('adminDeleteProduct');
});

Route::prefix('/admin/customer')->group(function () {
    Route::get('/', [AdminCustomerController::class, 'index'])->name('adminCustomers');
    // Route::get('/create', [AdminCustomerController::class, 'create'])->name('adminAddCustomer');
    // Route::get('/edit/{id}', [AdminCustomerController::class, 'edit'])->name('adminEditCustomer');
    // Route::post('/update', [AdminCustomerController::class, 'update'])->name('adminUpdateCustomer');
    // Route::post('/delete', [AdminCustomerController::class, 'delete'])->name('adminDeleteCustomer');
});

Route::prefix('/admin/order')->group(function () {
    Route::get('/', [AdminOrderController::class, 'index'])->name('adminOrder');
    Route::get('/list', [AdminOrderController::class, 'list'])->name('adminOrderList');
    Route::get('/single', [AdminOrderController::class, 'single'])->name('adminOrderSingle');
    // Route::get('/create', [AdminOrderController::class, 'create'])->name('adminAddOrder');
    // Route::get('/edit/{id}', [AdminOrderController::class, 'edit'])->name('adminEditOrder');
    // Route::post('/update', [AdminOrderController::class, 'update'])->name('adminUpdateOrder');
    // Route::post('/delete', [AdminOrderController::class, 'delete'])->name('adminDeleteOrder');
});

Route::prefix('/admin/review')->group(function () {
    Route::get('/', [AdminReviewController::class, 'index'])->name('adminReviews');
    // Route::get('/create', [AdminReviewController::class, 'create'])->name('adminAddReview');
    // Route::get('/edit/{id}', [AdminReviewController::class, 'edit'])->name('adminEditReview');
    // Route::post('/update', [AdminReviewController::class, 'update'])->name('adminUpdateReview');
    // Route::post('/delete', [AdminReviewController::class, 'delete'])->name('adminDeleteReview');
});

// =============== END ROUTE ADMIN =============== //
