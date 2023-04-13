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

Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('adminCategories');
Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('adminAddCategories');
// Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('adminEditCategory');
// Route::post('/admin/category/update', [AdminCategoryController::class, 'update'])->name('adminUpdateCategory');
// Route::post('/admin/category/delete', [AdminCategoryController::class, 'delete'])->name('adminDeleteCategory');

Route::get('/admin/products', [AdminProductController::class, 'index'])->name('adminProduct');
Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('adminAddProduct');
// Route::get('/admin/products/edit/{id}', [AdminProductController::class, 'edit'])->name('adminEditProduct');
// Route::post('/admin/products/update', [AdminProductController::class, 'update'])->name('adminUpdateProduct');
// Route::post('/admin/products/delete', [AdminProductController::class, 'delete'])->name('adminDeleteProduct');

Route::get('/admin/customer', [AdminCustomerController::class, 'index'])->name('adminCustomers');
// Route::get('/admin/customer/create', [AdminCustomerController::class, 'create'])->name('adminAddCustomer');
// Route::get('/admin/customer/edit/{id}', [AdminCustomerController::class, 'edit'])->name('adminEditCustomer');
// Route::post('/admin/customer/update', [AdminCustomerController::class, 'update'])->name('adminUpdateCustomer');
// Route::post('/admin/customer/delete', [AdminCustomerController::class, 'delete'])->name('adminDeleteCustomer');

Route::get('/admin/order', [AdminOrderController::class, 'index'])->name('adminOrder');
Route::get('/admin/order/list', [AdminOrderController::class, 'list'])->name('adminOrderList');
Route::get('/admin/order/single', [AdminOrderController::class, 'single'])->name('adminOrderSingle');
// Route::get('/admin/order/create', [AdminOrderController::class, 'create'])->name('adminAddOrder');
// Route::get('/admin/order/edit/{id}', [AdminOrderController::class, 'edit'])->name('adminEditOrder');
// Route::post('/admin/order/update', [AdminOrderController::class, 'update'])->name('adminUpdateOrder');
// Route::post('/admin/order/delete', [AdminOrderController::class, 'delete'])->name('adminDeleteOrder');

Route::get('/admin/review', [AdminReviewController::class, 'index'])->name('adminReviews');
// Route::get('/admin/review/create', [AdminReviewController::class, 'create'])->name('adminAddReview');
// Route::get('/admin/review/edit/{id}', [AdminReviewController::class, 'edit'])->name('adminEditReview');
// Route::post('/admin/review/update', [AdminReviewController::class, 'update'])->name('adminUpdateReview');
// Route::post('/admin/review/delete', [AdminReviewController::class, 'delete'])->name('adminDeleteReview');

// =============== END ROUTE ADMIN =============== //
