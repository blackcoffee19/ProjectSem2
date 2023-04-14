<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

// Route::get('/', function () {
//     return view('welcome');
// });


// =============== ROUTE USER =============== //
Route::get('/', [MyController::class,'home_page'])->name('index');
Route::get('/cate_pr', [MyController::class,'admin_cate'])->name('productList');
Route::get('/products', function () {
    return view('user.pages.Products.index');
})->name('products');
Route::get('/products-details/{id}', [MyController::class,'product_detail'])->name('products-details');
Route::post('/products-details/{id?}', [MyController::class,'addToCart'])->name('products-details');
Route::get('/shop-wishlist', function () {
    return view('user.pages.ShopWishlist.index');
})->name('wishlist');
Route::get('/shop-cart', function () {
    return view('user.pages.Orders.index');
})->name('order');


// ==========
Route::get('/removeCart/{id}',[MyController::class,'removeCart'])->name("removeId");
Route::get('/ajax/modal/show-product/{id}',[MyController::class,'modal_product']);
Route::get('/ajax/cart/listcart',[MyController::class,'modalCart']);
Route::get('/ajax/cart/clearcart',[MyController::class,'clearCart']);
Route::post('/addItemCart/{id}',[MyController::class,'cartadd_quan'])->name('cartadd');
Route::get('/minusItem/{id}',[MyController::class,'minusOne'])->name('minus');
Route::get('/addItem/{id}',[MyController::class,'addMore'])->name('addmore');
Route::get('/ajax/add-cart/{id}',[MyController::class,'addToCart2']);
Route::get('/ajax/add-favourite/{id}',[MyController::class,'add_favourite']);
Route::get('/ajax/add-compare/{id}',[MyController::class,'addCompare']);
Route::get('/ajax/compare/showcompare',[MyController::class,'showCompare']);
Route::get('/delcompare/{id}',[MyController::class,'delCompare'])->name('delCmp');
Route::get('/removeCmp',[MyController::class,'removeCompare'])->name('removeCmp');
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
Route::get('/product', function () {
    return view('admin.pages.Products.index');
})->name('adminProduct');
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
