<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminProductController;

// Route::get('/', function () {
//     return view('welcome');
// });


// =============== ROUTE USER =============== //
Route::get('/', function () {
    return view('user.index');
})->name('index');
Route::get('/products', function () {
    return view('user.pages.Products.index');
})->name('products');
Route::get('/products-details', function () {
    return view('user.pages.ProductDetails.index');
})->name('products-details');
Route::get('/shop-wishlist', function () {
    return view('user.pages.ShopWishlist.index');
})->name('wishlist');
Route::get('/shop-cart', function () {
    return view('user.pages.Orders.index');
})->name('order');

// ==========

Route::get('/account-orders', function () {
    return view('user.pages.About.order');
})->name('accountOrders');
Route::get('/account-setting', function () {
    return view('user.pages.About.setting');
})->name('accountSetting');
Route::get('/account-address', function () {
    return view('user.pages.About.address');
})->name('accountAddress');
Route::get('/account-payment', function () {
    return view('user.pages.About.payment');
})->name('accountPayment');

// =============== END ROUTE USER =============== //


// =============== ROUTE ADMIN =============== //
Route::get('/dashboard', function () {
    return view('admin.Dashboard');
})->name('dashboard');
// Route::get('/product', function () {
//     return view('admin.pages.Products.index');
// })->name('adminProduct');
Route::get('/admin/products', [AdminProductController::class, 'index'])->name('adminProduct');
Route::get('/add-product', function () {
    return view('admin.pages.Products.create');
})->name('adminAddProduct');
Route::get('/categories', function () {
    return view('admin.pages.Categories.index');
})->name('adminCategories');
Route::get('/add-categories', function () {
    return view('admin.pages.Categories.create');
})->name('adminAddCategories');
Route::get('/order-list', function () {
    return view('admin.pages.Order.list');
})->name('adminOrderList');
Route::get('/order-single', function () {
    return view('admin.pages.Order.single');
})->name('adminOrderSingle');
Route::get('/customers', function () {
    return view('admin.pages.Customers.index');
})->name('adminCustomers');
Route::get('/reviews', function () {
    return view('admin.pages.Reviews.index');
})->name('adminReviews');

// =============== END ROUTE ADMIN =============== //
