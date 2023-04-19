<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserProductDetailController;
use App\Http\Controllers\User\UserWishlistController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserAccountController;
use App\Http\Middleware\AdminLogin;
use App\Http\Middleware\UserLogin;
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

Route::get('/', [MyController::class,'home_page'])->name('index');
Route::get('/cate_pr', [MyController::class,'admin_cate'])->name('productList');
Route::get('/signin',[MyController::class,"get_signIn"])->name('signin');
Route::post('/signin',[MyController::class,"post_signIn"])->name('signin');
Route::get('/signup',[MyController::class,"get_signUp"])->name('signup');
Route::post('/signup',[MyController::class,"post_signUp"])->name('signup');
Route::get('/signout',[MyController::class,'signOut'])->name('signout');
Route::get('/order',[MyController::class,'get_order'])->name('order');
Route::get('/products', function () {
    return view('user.pages.Products.index');
})->name('products');
Route::get('/products-details/{id}', [MyController::class,'product_detail'])->name('products-details');
Route::post('/products-details/{id?}', [MyController::class,'addToCart'])->name('products-details');
Route::get('/shop-wishlist',[MyController::class,'get_wishlist'] )->name('wishlist');
Route::post('/shop-wishlist',[MyController::class,'post_wishlist'])->name('wishlist');
Route::get('/shop-cart', function () {
    return view('user.pages.Orders.index');
});

//UserLogin to get profie User
Route::group(['prefix'=>'account', 'middleware'=>'UserLogin'],function(){
    Route::get('/order',[MyController::class,'get_orderhistory'])->name('accountorder');
    Route::get('/setting',[MyController::class,'get_accountsetting'])->name('accountsetting');
    Route::get('/list_address',[MyController::class,'get_address'])->name('accountaddress');
    Route::get('/remove_address/{id}',[MyController::class,'remove_address'])->name('removeAdd');
    Route::get('/default-address/{id}',[MyController::class,'setdefault_address'])->name('setdefault_address');
    Route::get('/payment',[MyController::class,'get_payment'])->name('accountpayment');
    Route::get('/feedback/{code}',[MyController::class,'get_feedback'])->name('feedback');
    Route::post('/feedback/{code}',[MyController::class,'post_feedback'])->name('feedback');
    Route::post('/edit-profie',[MyController::class,'post_editprofie'])->name('edit_profie');
    Route::post('/change-password',[MyController::class,'post_changepassword'])->name('change_password');
    Route::post('/edit-order',[MyController::class,'post_urseditorder'])->name('user_editorder');
    Route::get('/cancel-order/{id}',[MyController::class,'cancel_order'])->name('cancelorder');
    Route::get('/ajax/edit_order/{id}',[MyController::class,'ajax_getOrder']);
    Route::post('/ajax/check-password',[MyController::class,'check_password']);

});

// ========== Dont need to know What is MyController now
// ========== I didn't upload it for now
// ========== Just know that Tuong finished Cart, Modal Product, Compare Product, Add Favourite, Add Coupon, Finish Order
Route::get('/checkout',[MyController::class,'get_checkout'])->name('checkout');
Route::post('/checkout',[MyController::class,'post_checkout'])->name('checkout');
Route::get('/removeCart/{id}',[MyController::class,'removeCart'])->name("removeId");
Route::get('/ajax/modal/show-product/{id}',[MyController::class,'modal_product']);
Route::get('/ajax/cart/listcart',[MyController::class,'modalCart']);
Route::get('/ajax/cart/clearcart',[MyController::class,'clearCart']);
Route::post('/add_address',[MyController::class,'add_address'])->name('post_address');
Route::get('/remove_address/{id}',[MyController::class,'remove_address']);
Route::post('/addItemCart/{id}',[MyController::class,'cartadd_quan'])->name('cartadd');
Route::get('/minusItem/{id}',[MyController::class,'minusOne'])->name('minus');
Route::get('/addItem/{id}',[MyController::class,'addMore'])->name('addmore');
Route::get('/ajax/add-cart/{id}',[MyController::class,'addToCart2']);
Route::get('/ajax/add-favourite/{id}',[MyController::class,'add_favourite']);
Route::get('/ajax/add-compare/{id}',[MyController::class,'addCompare']);
Route::get('/ajax/add-coupon/{coupon}',[MyController::class,'addCoupon']);
Route::get('/ajax/compare/showcompare',[MyController::class,'showCompare']);
Route::get('/delcompare/{id}',[MyController::class,'delCompare'])->name('delCmp');
Route::get('/removeCmp',[MyController::class,'removeCompare'])->name('removeCmp');


// ==========

// Route::get('/', [IndexController::class, 'index'])->name('index');

// Route::get('/category', [UserProductController::class, 'index'])->name('products');

// Route::get('/product-detail', [UserProductDetailController::class, 'index'])->name('products-details');

// Route::get('/wishlist', [UserWishlistController::class, 'index'])->name('wishlist');

// Route::get('/order', [UserOrderController::class, 'index'])->name('order');

// Route::get('/account/accorder', [UserAccountController::class, 'Orders'])->name('accountorder');
// Route::get('/account/setting', [UserAccountController::class, 'Settings'])->name('setting');
// Route::get('/account/address', [UserAccountController::class, 'Address'])->name('address');
// Route::get('/account/payment', [UserAccountController::class, 'PaymentMethod'])->name('payment');



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
