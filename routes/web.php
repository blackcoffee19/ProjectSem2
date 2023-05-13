<?php

use App\Http\Controllers\Admin\AdminBannerController;
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

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminNewController;


Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
// =============== ROUTE USER =============== //

Route::get('/user.pages.Contact.mail', [App\Http\Controllers\User\UserController::class, 'Mail'])->name('user.pages.Contact.mail');
Route::post('/user/send-mail', [UserController::class, 'sendMail'])->name('user.sendMail');
Route::get('/aboutUs', [App\Http\Controllers\User\UserController::class, 'AboutUs'])->name('user.pages.AboutUs.index');
Route::get('/contact', [App\Http\Controllers\User\UserController::class, 'Contact'])->name('user.pages.Contact.index');
Route::get('/search', [App\Http\Controllers\User\UserController::class, 'searchPrice'])->name('product.searchPrice');
Route::get('/searchproduct', [App\Http\Controllers\User\UserController::class, 'categoryById'])->name('ShowProductCatagory');
Route::get('/product.findByNamePro', [App\Http\Controllers\User\UserController::class, 'findByNamePro'])->name('product.findByNamePro');
Route::get('/user.pages.Products.index', [UserController::class, 'index'])->name('user.pages.Products.index');
// Route::get('/user.pages.Products.index/{breed_name?}', [UserController::class, "productList"])->name('user.pages.Products.index');

Route::get('/', [TuongController::class, 'home_page'])->name('index');
Route::get('/cate_pr', [TuongController::class, 'admin_cate'])->name('productList');
Route::get('/signin', [TuongController::class, "get_signIn"])->name('signin');
Route::post('/signin', [TuongController::class, "post_signIn"])->name('signin');
Route::get('/signup', [TuongController::class, "get_signUp"])->name('signup');
Route::post('/signup', [TuongController::class, "post_signUp"])->name('signup');
Route::get('/verify/{token}', [TuongController::class, 'verifyEmail'])->name('verify');
Route::get('/verify-send', [TuongController::class, 'send_verifyEmail'])->name('verifyEmail');

Route::get('/signout', [TuongController::class, 'signOut'])->name('signout');

// Route::get('/products-details/{id}', [TuongController::class,'product_detail'])->name('products-details');
Route::get('/remove-news', [TuongController::class, 'remove_allnews'])->name('remove-allnews');
Route::post('/post-comment', [TuongController::class, 'post_comment'])->name('addComment');
Route::get('/delete_cmt/{id}', [TuongController::class, 'deleteCmt'])->name('delete_cmt');
Route::post('/edit_cmt/{id}', [TuongController::class, 'editCmt'])->name('edit_cmt');
Route::get('/shop-wishlist', [TuongController::class, 'get_wishlist'])->name('wishlist');
Route::post('/shop-wishlist', [TuongController::class, 'post_wishlist'])->name('wishlist');
Route::get('/ajax/modal/show-product/{id}', [TuongController::class, 'modal_product']);
Route::get('/ajax/check-order/{id}',[TuongController::class,'user_orderdetail']);
Route::group(['prefix' => 'manager'], function () {
    Route::get('/ajax/check-order/{id}', [TuongController::class, 'modal_order']);
    Route::get('/ajax/check-notificate/{code}', [TuongController::class, 'modal_notificate']);
    Route::post('/confirm', [TuongController::class, 'post_confirmorder'])->name('confirm_order');
    Route::post('/remove-notificate', [TuongController::class, 'post_removenoti'])->name('remove_notificate');
    Route::get('/list_order', [TuongController::class, 'list_allorder'])->name('allorder');
});
Route::get('/ajax/message/show', [TuongController::class, 'get_listmessage']);
Route::post('/ajax-post/message', [TuongController::class, 'postajax_message']);
//Login Google
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);

Route::group(['prefix' => '/', 'middleware' => 'ManageLogin'], function () {
    Route::post('/products-details/{id?}', [TuongController::class, 'addToCart'])->name('post_products_details');
    Route::get('/checkout', [TuongController::class, 'get_checkout'])->name('checkout');
    Route::post('/checkout', [TuongController::class, 'post_checkout'])->name('checkout');
    Route::get('/order', [TuongController::class, 'get_order'])->name('order');
    Route::get('/removeCart/{id}', [TuongController::class, 'removeCart'])->name("removeId");
    Route::get('/ajax/cart/listcart', [TuongController::class, 'modalCart']);
    Route::get('/ajax/cart/clearcart', [TuongController::class, 'clearCart']);
    Route::get('/ajax/cart/clearcart', [TuongController::class, 'clearCart'])->name('clear_cart');
    Route::post('/add_address', [TuongController::class, 'add_address'])->name('post_address');
    Route::get('/remove_address/{id}', [TuongController::class, 'remove_address']);
    Route::get('/ajax/get-address/{id}', [TuongController::class, 'get_addressdetail']);
    Route::post('/addItemCart/{id}', [TuongController::class, 'cartadd_quan'])->name('cartadd');
    Route::get('/minusItem/{id}', [TuongController::class, 'minusOne'])->name('minus');
    Route::get('/addItem/{id}', [TuongController::class, 'addMore'])->name('addmore');
    Route::get('/ajax/add-cart/{id}', [TuongController::class, 'addToCart2']);
    Route::get('/ajax/add-coupon/{coupon}', [TuongController::class, 'addCoupon']);
    Route::post('/ajax/denied-order', [TuongController::class, 'denied_order']);
    Route::post('/ajax/accept-order', [TuongController::class, 'accept_order']);
    Route::get('/ajax/show_coupon/{code}', [TuongController::class, 'model_coupon']);
});
Route::get('/ajax/check-email/{email}', [TuongController::class, 'check_email']);
Route::get('/ajax/check-phone/{phone}', [TuongController::class, 'check_phone']);
Route::get('/ajax/add-favourite/{id}', [TuongController::class, 'add_favourite']);
Route::get('/ajax/add-compare/{id}', [TuongController::class, 'addCompare']);
Route::get('/ajax/compare/showcompare', [TuongController::class, 'showCompare']);
// AJAX GET API GHTK- GHN
Route::get('/ajax/ghtk_service/fee',[TuongController::class,'ghtk_servicefee']);
Route::get('/ajax/ghn_service/service',[TuongController::class,'ghn_getservice']);
Route::get('/ajax/ghn_service/fee',[TuongController::class,'gtn_servicefee']);
Route::get('/ajax/ghtk_service/order',[TuongController::class,'ghtk_order'])->name('ghtk_order');

Route::get('/delcompare/{id}', [TuongController::class, 'delCompare'])->name('delCmp');
Route::get('/removeCmp', [TuongController::class, 'removeCompare'])->name('removeCmp');
//UserLogin to get profie User
Route::group(['prefix' => 'account', 'middleware' => 'UserLogin'], function () {
    Route::get('/order', [TuongController::class, 'get_orderhistory'])->name('accountorder');
    Route::get('/setting', [TuongController::class, 'get_accountsetting'])->name('accountsetting');
    Route::get('/list_address', [TuongController::class, 'get_address'])->name('accountaddress');
    Route::get('/remove_address/{id}', [TuongController::class, 'remove_address'])->name('removeAdd');
    Route::get('/default-address/{id}', [TuongController::class, 'setdefault_address'])->name('setdefault_address');
    Route::get('/payment', [TuongController::class, 'get_payment'])->name('accountpayment');
    Route::get('/feedback/{code}', [TuongController::class, 'get_feedback'])->name('feedback');
    Route::post('/feedback/{code}', [TuongController::class, 'post_feedback'])->name('feedback');
    Route::post('/edit-profie', [TuongController::class, 'post_editprofie'])->name('edit_profie');
    Route::post('/change-password', [TuongController::class, 'post_changepassword'])->name('change_password');
    Route::post('/edit-order', [TuongController::class, 'post_urseditorder'])->name('user_editorder');
    Route::get('/cancel-order/{id}', [TuongController::class, 'cancel_order'])->name('cancelorder');
    Route::get('/ajax/edit_order/{id}', [TuongController::class, 'ajax_getOrder']);
    Route::post('/ajax/check-password', [TuongController::class, 'check_password']);
});

// =============== START ROUTE USER =============== //

Route::controller(IndexController::class)->group(function () {
    Route::get('/category',                     'allProduct')->name('allProduct');
    Route::get('/products/{id?}',               'product_detail')->name('products-details');
    Route::get('/PrivacyPolicy',                'privacy')->name('privacy');
    Route::get('/category/{type}',              'categoryById')->name('userShowProductCatagory');
});



// =============== END ROUTE USER =============== //


// =============== ROUTE ADMIN =============== //
Route::get('/admin/signin', [TuongController::class, 'get_admin_signin'])->name('admin_signin');
Route::get('/admin', [TuongController::class, 'get_admin_signin'])->name('admin_signin');
Route::post('/admin/signin', [TuongController::class, 'post_admin_signin'])->name('admin_signin');
Route::group(['prefix' => 'admin', 'middleware' => 'AdminLogin'], function () {


    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/news/order/{code}', [AdminDashboardController::class, 'get_orderdetail'])->name('showOrderDetail');
    Route::controller(AdminCategoryController::class)->group(function () {
        Route::get('/category',                       'index')->name('adminCategories');
        Route::get('/category/find-by-name',          'findByName')->name('category.findByName');
        Route::get('/category/create',                'create')->name('adminAddCategories');
        Route::post('/category/store',                'store')->name('adminStoreCategories');
        Route::get('/category/detail/{id_type}',      'show')->name('adminShowCategory');
        Route::get('/category/edit/{id_type}',        'edit')->name('adminEditCategory');
        Route::put('/category/update/{id_type}',      'update')->name('adminUpdateCategory');
        Route::delete('/category/delete/{id_type}',   'delete')->name('adminDeleteCategory');
    });


    Route::controller(AdminProductController::class)->group(function () {
        Route::get('/products',                           'index')->name('adminProduct');
        Route::get('/products/find-by-name',              'findByNameP')->name('product.findByName');
        Route::get('/products/create',                    'create')->name('adminAddProduct');
        Route::post('/products/store',                    'store')->name('admin.product.store');
        Route::get('/products/detail/{id_product}',       'show')->name('adminShowProduct');
        Route::get('/products/edit/{id_product}',         'edit')->name('adminEditProduct');
        Route::post('/products/update/{id_product}',       'update')->name('adminUpdateProduct');
        Route::delete('/products/delete/{id_product}',    'delete')->name('adminDeleteProduct');
        Route::get('/ajax/check-product',                 'check_name');
    });


    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/order',                      'index')->name('adminOrder');
        Route::get('/order/find-by-name',         'findByNameO')->name('orther.findByName');
        Route::get('/order/detail/{id_order}',    'show')->name('adminShowOrther');
    });


    // Route::controller(AdminCustomerController::class)->group(function () {
    //     Route::get('/customer',   'index')->name('adminCustomers');
    // });
    Route::controller(AdminCustomerController::class)->group(function () {
        Route::get('/admin/customer',                       'index')->name('adminCustomers');
        Route::get('/admin/customer/find-by-name',          'findByName')->name('customer.findByName');
        Route::get('/admin/customer/create',                'create')->name('adminAddCustomers');
        Route::post('/admin/customer/store',                'store')->name('adminStoreCustomers');
        Route::get('/admin/customer/detail/{id_user}',      'show')->name('adminShowCustomers');
        Route::get('/admin/customer/edit/{id_user}',        'edit')->name('adminEditCustomers');
        Route::put('/admin/customer/update/{id_user}',      'update')->name('adminUpdateCustomers');
        Route::delete('/admin/customer/delete/{id_user}',   'delete')->name('adminDeleteCustomers');
    });


    Route::controller(AdminReviewController::class)->group(function () {
        Route::get('/review',                 'index')->name('adminReviews');
        Route::get('/review/find-by-name',    'findByName')->name('review.findByName');
    });


    Route::controller(AdminBannerController::class)->group(function () {
        Route::get('/banners',                        'index')->name('adminBanners');
        Route::get('/banners/detail/{id_banner}',     'show')->name('adminShowBanners');
        Route::get('/banners/edit/{id_banner}',       'edit')->name('adminEditBanners');
        Route::put('/banners/update/{id_banner}',     'update')->name('adminUpdateBanners');
    });

    Route::controller(AdminSlideController::class)->group(function () {
        Route::get('/slides',                       'index')->name('adminSlides');
        Route::get('/slides/create',                'create')->name('adminAddSlides');
        Route::post('/slides/store',                'store')->name('adminStoreSlides');
        Route::get('/slides/detail/{id_slide}',     'show')->name('adminShowSlides');
        Route::get('/slides/edit/{id_slide}',       'edit')->name('adminEditSlides');
        Route::put('/slides/update/{id_slide}',     'update')->name('adminUpdateSlides');
        Route::delete('/slides/delete/{id_slide}',  'delete')->name('adminDeleteSlides');
    });

    Route::controller(AdminCouponController::class)->group(function () {
        Route::get('/coupon',                       'index')->name('adminCoupon');
        Route::get('/coupon/create',                'create')->name('adminAddCoupon');
        Route::post('/coupon/store',                'store')->name('adminStoreCoupon');
        Route::get('/coupon/edit/{id_coupon}',       'edit')->name('adminEditCoupon');
        Route::put('/coupon/update/{id_coupon}',     'update')->name('adminUpdateCoupon');
        Route::delete('/coupon/delete/{id_coupon}',  'delete')->name('adminDeleteCoupon');
        // Route::get('/coupon/detail/{id_coupon}',     'show')->name('adminShowCoupon');
    });

    Route::controller(AdminNewController::class)->group(function () {
        Route::get('/new',                       'index')->name('adminNew');
        Route::get('/new/create',                'create')->name('adminCreateNew');
        Route::post('/new/store',                'store')->name('adminStoreNew');
        Route::get('/new/edit/{id_news}',       'edit')->name('adminEditNew');
        Route::put('/new/update/{id_news}',     'update')->name('adminUpdateNew');
        Route::delete('/new/delete/{id_news}',  'delete')->name('adminDeleteNew');
        // Route::get('/new/detail/{id_news}',     'show')->name('adminShowNew');
    });

    Route::get('{path?}', [TuongController::class, 'get_admin_signin'])->where('path', '.*');
    // =============== END ROUTE ADMIN =============== //
});
// =============== 404 Page ===================== //
Route::get('/{path}', [TuongController::class, 'get_404'])->where('path', '.*');
// =============== END 404 Page ===================== //


Route::get('/validate-input/{inputName}/{inputValue}', function ($inputName, $inputValue) {
    $response = array('success' => true);

    // Kiểm tra giá trị của input
    if ($inputName == 'discount' && $inputValue < 0) {
        $response = array('success' => false, 'message' => 'Discount không được nhập số âm');
    }
    if ($inputName == 'max' && $inputValue < 0) {
        $response = array('success' => false, 'message' => 'Max không được nhập số âm');
    }

    return response()->json($response);
});
