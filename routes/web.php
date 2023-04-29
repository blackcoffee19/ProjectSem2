<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TuongController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserProductDetailController;
use App\Http\Controllers\User\UserWishlistController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserAccountController;
use App\Http\Controllers\PayPalController;

use App\Http\Middleware\AdminLogin;
use App\Http\Middleware\UserLogin;
use App\Http\Middleware\ManagerLogin;
use App\Http\Middleware\PaiedOrder;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminReviewController;


Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
// =============== ROUTE USER =============== //

Route::get('/product.findByNamePro',[App\Http\Controllers\User\UserController::class ,'findByNamePro'])->name('product.findByNamePro');
Route::get('/user.pages.Products.index', [UserController::class, 'index'])->name('user.pages.Products.index');
Route::get('/user.pages.Products.index/{type_name?}/{breed_name?}',[UserController::class,"productList"])->name('user.pages.Products.index');

Route::get('/', [TuongController::class,'home_page'])->name('index');
Route::get('/cate_pr', [TuongController::class,'admin_cate'])->name('productList');
Route::get('/signin',[TuongController::class,"get_signIn"])->name('signin');
Route::post('/signin',[TuongController::class,"post_signIn"])->name('signin');
Route::get('/signup',[TuongController::class,"get_signUp"])->name('signup');
Route::post('/signup',[TuongController::class,"post_signUp"])->name('signup');
Route::get('/signout',[TuongController::class,'signOut'])->name('signout');

Route::get('/products-details/{id}', [TuongController::class,'product_detail'])->name('products-details');
Route::post('/products-details/{id?}', [TuongController::class,'addToCart'])->name('products-details');
Route::post('/post-comment',[TuongController::class,'post_comment'])->name('addComment');
Route::get('/delete_cmt/{id}',[TuongController::class,'deleteCmt'])->name('delete_cmt');
Route::post('/edit_cmt/{id}',[TuongController::class,'editCmt'])->name('edit_cmt');
Route::get('/shop-wishlist',[TuongController::class,'get_wishlist'] )->name('wishlist');
Route::post('/shop-wishlist',[TuongController::class,'post_wishlist'])->name('wishlist');
Route::get('/ajax/modal/show-product/{id}',[TuongController::class,'modal_product']);
Route::group(['prefix'=>'manager'],function(){
    Route::get('/ajax/check-order/{id}',[TuongController::class,'modal_order']);
    Route::post('/confirm',[TuongController::class,'post_confirmorder'])->name('confirm_order');
    Route::get('/list_order',[TuongController::class,'list_allorder'])->name('allorder');
});
//Login Google
Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('/auth/google/callback',[GoogleAuthController::class,'callbackGoogle']);

Route::group(['prefix'=>'/','middleware'=>'ManageLogin'],function(){
    Route::get('/checkout',[TuongController::class,'get_checkout'])->name('checkout');
    Route::post('/checkout',[TuongController::class,'post_checkout'])->name('checkout');
    Route::get('/order',[TuongController::class,'get_order'])->name('order');
    Route::get('/removeCart/{id}',[TuongController::class,'removeCart'])->name("removeId");
    Route::get('/ajax/cart/listcart',[TuongController::class,'modalCart']);
    Route::get('/ajax/cart/clearcart',[TuongController::class,'clearCart']);
    Route::get('/ajax/cart/clearcart',[TuongController::class,'clearCart'])->name('clear_cart');
    Route::post('/add_address',[TuongController::class,'add_address'])->name('post_address');
    Route::get('/remove_address/{id}',[TuongController::class,'remove_address']);
    Route::get('/ajax/get-address/{id}',[TuongController::class,'get_addressdetail']);
    Route::post('/addItemCart/{id}',[TuongController::class,'cartadd_quan'])->name('cartadd');
    Route::get('/minusItem/{id}',[TuongController::class,'minusOne'])->name('minus');
    Route::get('/addItem/{id}',[TuongController::class,'addMore'])->name('addmore');
    Route::get('/ajax/add-cart/{id}',[TuongController::class,'addToCart2']);
    Route::get('/ajax/add-coupon/{coupon}',[TuongController::class,'addCoupon']);
    Route::post('/ajax/denied-order',[TuongController::class,'denied_order']);
    Route::post('/ajax/accept-order',[TuongController::class,'accept_order']);
});
Route::get('/ajax/check-email/{email}',[TuongController::class,'check_email']);
Route::get('/ajax/check-phone/{phone}',[TuongController::class,'check_phone']);
Route::get('/ajax/add-favourite/{id}',[TuongController::class,'add_favourite']);
Route::get('/ajax/add-compare/{id}',[TuongController::class,'addCompare']);
Route::get('/ajax/compare/showcompare',[TuongController::class,'showCompare']);
Route::get('/delcompare/{id}',[TuongController::class,'delCompare'])->name('delCmp');
Route::get('/removeCmp',[TuongController::class,'removeCompare'])->name('removeCmp');
//UserLogin to get profie User
Route::group(['prefix'=>'account', 'middleware'=>'UserLogin'],function(){
    Route::get('/order',[TuongController::class,'get_orderhistory'])->name('accountorder');
    Route::get('/setting',[TuongController::class,'get_accountsetting'])->name('accountsetting');
    Route::get('/list_address',[TuongController::class,'get_address'])->name('accountaddress');
    Route::get('/remove_address/{id}',[TuongController::class,'remove_address'])->name('removeAdd');
    Route::get('/default-address/{id}',[TuongController::class,'setdefault_address'])->name('setdefault_address');
    Route::get('/payment',[TuongController::class,'get_payment'])->name('accountpayment');
    Route::get('/feedback/{code}',[TuongController::class,'get_feedback'])->name('feedback');
    Route::post('/feedback/{code}',[TuongController::class,'post_feedback'])->name('feedback');
    Route::post('/edit-profie',[TuongController::class,'post_editprofie'])->name('edit_profie');
    Route::post('/change-password',[TuongController::class,'post_changepassword'])->name('change_password');
    Route::post('/edit-order',[TuongController::class,'post_urseditorder'])->name('user_editorder');
    Route::get('/cancel-order/{id}',[TuongController::class,'cancel_order'])->name('cancelorder');
    Route::get('/ajax/edit_order/{id}',[TuongController::class,'ajax_getOrder']);
    Route::post('/ajax/check-password',[TuongController::class,'check_password']);

});

// =============== START ROUTE USER =============== //

Route::controller(IndexController::class)->group(function () {
    Route::get('/Category',                     'allProduct')->name('allProduct');
    Route::get('/products-details/{id}',        'product_detail')->name('products-details');
    Route::get('/PrivacyPolicy',                'privacy')->name('privacy');
    Route::get('/category/{type}',              'categoryById')->name('userShowProductCatagory');
});



// =============== END ROUTE USER =============== //


// =============== ROUTE ADMIN =============== //

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

Route::controller(AdminCategoryController::class)->group(function () {
    Route::get('/admin/category',                       'index')->name('adminCategories');
    Route::get('/admin/category/find-by-name',          'findByName')->name('category.findByName');
    Route::get('/admin/category/create',                'create')->name('adminAddCategories');
    Route::post('/admin/category/store',                'store')->name('adminStoreCategories');
    Route::get('/admin/category/detail/{id_type}',      'show')->name('adminShowCategory');
    Route::get('/admin/category/edit/{id_type}',        'edit')->name('adminEditCategory');
    Route::put('/admin/category/update/{id_type}',      'update')->name('adminUpdateCategory');
    Route::delete('/admin/category/delete/{id_type}',   'delete')->name('adminDeleteCategory');
});


Route::controller(AdminProductController::class)->group(function () {
    Route::get('/admin/products',                           'index')->name('adminProduct');
    Route::get('/admin/products/find-by-name',              'findByNameP')->name('product.findByName');
    Route::get('/admin/products/create',                    'create')->name('adminAddProduct');
    Route::post('/admin/products/store',                    'store')->name('admin.product.store');
    Route::get('/admin/products/detail/{id_product}',       'show')->name('adminShowProduct');
    Route::get('/admin/products/edit/{id_product}',         'edit')->name('adminEditProduct');
    Route::put('/admin/products/update/{id_product}',       'update')->name('adminUpdateProduct');
    Route::delete('/admin/products/delete/{id_product}',    'delete')->name('adminDeleteProduct');
});


Route::controller(AdminOrderController::class)->group(function () {
    Route::get('/admin/order',                      'index')->name('adminOrder');
    Route::get('/admin/order/find-by-name',         'findByNameO')->name('orther.findByName');
    Route::get('/admin/order/detail/{id_order}',    'show')->name('adminShowOrther');
});


Route::controller(AdminCustomerController::class)->group(function () {
    Route::get('/admin/customer',                              'index')->name('adminCustomers');
});


Route::controller(AdminReviewController::class)->group(function () {
    Route::get('/admin/review',                              'index')->name('adminReviews');
});


// =============== END ROUTE ADMIN =============== //
