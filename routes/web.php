<?php

use App\Http\Controllers\bannerController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\cardController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\chackoutController;
use App\Http\Controllers\couponController;
use App\Http\Controllers\customerloginController;
use App\Http\Controllers\customerProfileController;
use App\Http\Controllers\customerregController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\productvarController;
use App\Http\Controllers\subcategoryController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// frontend
Route::get('/', [frontendController::class, 'index'])->name('index');
Route::get('/product/details/{slug}', [frontendController::class, 'product_details'])->name('product.details');
Route::get('/product/card', [frontendController::class, 'product_card'])->name('product.card');

// chackout
Route::get('/chackout', [chackoutController::class, 'chackout'])->name('chackout');
Route::post('/chackout/store', [chackoutController::class, 'chackout_store'])->name('chackout.store');
Route::get('/order/success', [chackoutController::class, 'order_success'])->name('order.success');

// card
Route::post('/card/store', [cardController::class, 'card_store'])->name('card.store');
Route::get('/card/delete{card_id}', [cardController::class, 'card_delete'])->name('card.delete');

// customer profile
Route::get('/customer/profile', [customerProfileController::class, 'customer_profile'])->name('customer.profile');
Route::get('/customer/dashbord', [customerProfileController::class, 'customar_dashbord'])->name('customar.dashbord');
Route::get('/customer/order', [customerProfileController::class, 'customar_order'])->name('customar.order');
Route::get('/customer/wish', [customerProfileController::class, 'customar_wish'])->name('customar.wish');
Route::get('/customer/card', [customerProfileController::class, 'customar_card'])->name('customar.card');
Route::get('/customer/address', [customerProfileController::class, 'customar_address'])->name('customar.address');
Route::get('/customer/privacy', [customerProfileController::class, 'customar_privacy'])->name('customar.privacy');
Route::post('/customer/profile/update', [customerProfileController::class, 'customer_profile_update'])->name('customer.profile.update');
Route::post('/getcity', [customerProfileController::class, 'getcity']);


// customer
Route::get('/customer/reg', [customerregController::class, 'customer_reg'])->name('customer.reg');
Route::post('/customer/reg/store', [customerregController::class, 'customer_reg_store'])->name('customer.reg.store');
Route::get('/customer/log/view', [customerloginController::class, 'customer_log_view'])->name('customer.log.view');
Route::post('/customer/login', [customerloginController::class, 'customer_login'])->name('customer.login');
Route::get('/customer/logout', [customerloginController::class, 'customer_logout'])->name('customer.logout');


// banner
Route::get('/banner', [bannerController::class, 'banner'])->name('banner');
Route::post('/banner/store', [bannerController::class, 'banner_store'])->name('banner.store');
Route::get('/banner/delete/{banner_id}', [bannerController::class, 'banner_delete'])->name('banner.delete');
Route::get('/top/banner', [bannerController::class, 'top_banner'])->name('top.banner');
Route::post('/top/banner/store', [bannerController::class, 'top_banner_store'])->name('top.banner.store');
Route::get('/top/banner/delete/{tbanner_id}', [bannerController::class, 'top_banner_delete'])->name('top.banner.delete');
Route::get('/buttom/banner', [bannerController::class, 'buttom_banner'])->name('buttom.banner');
Route::post('/buttom/banner/store', [bannerController::class, 'buttom_banner_store'])->name('buttom.banner.store');
Route::get('/buttom/banner/delete/{bbanner_id}', [bannerController::class, 'buttom_banner_delete'])->name('buttom.banner.delete');
Route::get('/off/banner', [bannerController::class, 'off_banner'])->name('off.banner');
Route::post('/off/banner/store', [bannerController::class, 'off_banner_store'])->name('off.banner.store');
Route::get('/off/banner/delete/{fbanner_id}', [bannerController::class, 'off_banner_delete'])->name('off.banner.delete');

Auth::routes();
// dashbord
Route::get('/home', [HomeController::class, 'home'])->name('home');
// logout
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');


// user
Route::get('/user/list', [userController::class, 'user_list'])->name('user.list');
Route::get('/user/add', [userController::class, 'add_user'])->name('add.user');
Route::post('/user/stor', [userController::class, 'user_stor'])->name('user.stor');
Route::get('/user/delete/{user_id}', [userController::class, 'user_delete'])->name('user.delete');
// account setting
Route::get('/account/setting', [userController::class, 'account_setting'])->name('account.setting');
Route::post('/account/update', [userController::class, 'account_update'])->name('account.update');

// category
Route::get('/add/category', [categoryController::class, 'add_category'])->name('add.category');
Route::post('/store/category', [categoryController::class, 'store_category'])->name('category.store');
Route::get('/category/list', [categoryController::class, 'category_list'])->name('category.list');
Route::get('/category/delete/{category_id}', [categoryController::class, 'category_delete'])->name('category.delete');
Route::get('/category/update/{category_id}', [categoryController::class, 'category_update'])->name('category.update');
Route::post('/category/edit', [categoryController::class, 'category_edit'])->name('category.edit');

// subcategory
Route::get('/subcategory', [subcategoryController::class, 'subcategory'])->name('subcategory');
Route::post('/subcategory/store', [subcategoryController::class, 'subcategory_store'])->name('subcategory.store');
Route::get('/subcategory/list', [subcategoryController::class, 'subcategory_list'])->name('subcategory.list');
Route::get('/subcategory/delete/{subcategory_id}', [subcategoryController::class, 'subcategory_delete'])->name('subcategory.delete');
Route::get('/subcategory/update/{subcategory_id}', [subcategoryController::class, 'subcategory_update'])->name('subcategory.update');
Route::post('/subcategory/edit', [subcategoryController::class, 'subcategory_edit'])->name('subcategory.edit');

// brand
Route::get('/brand', [brandController::class, 'brand'])->name('brand');
Route::post('/brand/store', [brandController::class, 'brand_store'])->name('brand.store');
Route::get('/brand/list', [brandController::class, 'brand_list'])->name('brand.list');
Route::get('/brand/delete/{brand_id}', [brandController::class, 'brand_delete'])->name('brand.delete');

// product
Route::get('/product/var', [productvarController::class, 'product_var'])->name('product.var');
Route::post('/color/store', [productvarController::class, 'color_store'])->name('color.store');
Route::get('/color/delete/{color_id}', [productvarController::class, 'color_delete'])->name('color.delete');
Route::post('/size/store', [productvarController::class, 'size_store'])->name('size.store');
Route::get('/size/delete/{size_id}', [productvarController::class, 'size_delete'])->name('size.delete');
Route::post('/size/number/store', [productvarController::class, 'size_number_store'])->name('size.number.store');
Route::get('/sizen/delete/{sizen_id}', [productvarController::class, 'sizen_delete'])->name('sizen.delete');
// product add
Route::get('/add/product', [productController::class, 'add_product'])->name('add.product');
Route::post('/getsubcategory', [productController::class, 'getsubcategory']);
Route::post('/product/store', [productController::class, 'product_store'])->name('product.store');
Route::get('/product/list', [productController::class, 'product_list'])->name('product.list');
Route::get('/product/delete/{product_id}', [productController::class, 'product_delete'])->name('product.delete');
Route::get('/product/inventory/{product_id}', [productController::class, 'product_inventory'])->name('product.inventory');
Route::post('/inventory/store', [productController::class, 'inventory_store'])->name('inventory.store');
Route::get('/inventory/delete/{inventory_id}', [productController::class, 'inventory_delete'])->name('inventory.delete');

// order
Route::get('/order/list', [orderController::class, 'order_list'])->name('order.list');
Route::get('/order/details/{order_id}', [orderController::class, 'order_details'])->name('order.details');


// Coupon
Route::get('/coupon', [couponController::class, 'coupon'])->name('coupon');
Route::post('/coupon/store', [couponController::class, 'coupon_store'])->name('coupon.store');
Route::get('/coupon/delete/{coupon_id}', [couponController::class, 'coupon_delete'])->name('coupon.delete');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::get('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

