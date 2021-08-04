<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Livewire\AdminDashboardComponent;
use App\Http\Livewire\AdminOrderComponent;
use App\Http\Livewire\AdminOrderDetailsComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserChangePasswordComponent as UserUserChangePasswordComponent;
use App\Http\Livewire\UserChangePasswordComponent;
use App\Http\Livewire\UserDashboardComponent;
use App\Http\Livewire\UserOrderComponent;
use App\Http\Livewire\UserOrderDetailsComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout.index');

Route::get('product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');

Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');


//For User or Customer
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/change-password',UserChangePasswordComponent::class)->name('userchangepassword');
});
//For Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});

//Tu Loc Category 
Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');

// Route::get('/mail', function() {
//     $order = App\Models\Order::find(1);

//     return new \App\Mail\TestMail($order);
// });

// Admin
Route::get('orders', AdminOrderComponent::class)->name('orders');
Route::get('orderdetails/{order_id}', AdminOrderDetailsComponent::class)->name('orderdetails');

//Coupon
Route::get('coupons', [CouponController::class, 'get']);
Route::get('coupons/add', [CouponController::class, 'create']);
Route::post('coupons/createCoupon', [CouponController::class, 'createCoupon']);
Route::get('coupons/detail/{id}', [CouponController::class, 'getOnly']);
Route::get('coupons/delete/{id}', [CouponController::class, 'delete']);
Route::get('coupons/edit/{id}', [CouponController::class, 'edit']);
Route::post('coupons/editCoupon/{id}', [CouponController::class, 'editCoupon']); 

//Admin Product
Route::get('admin/product/view', [ProductController::class, 'get']);
Route::get('admin/product/add', [ProductController::class,'add']);
Route::post('admin/product/addproduct', [ProductController::class, 'addproduct']);
Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
Route::get('admin/product/edit/{id}',[ProductController::class, 'edit']);
Route::post('admin/product/editPost/{id}' ,[ProductController::class, 'editPost']);

//Admin Category

Route::get('admin/category/view', [CategoryController::class, 'get']);
Route::get('admin/category/add', [CategoryController::class,'add']);
Route::post('admin/category/addcategory', [CategoryController::class, 'addcategory']);
Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('admin/category/editPost/{id}', [CategoryController::class, 'editPost']);

//User
Route::get('userorder', UserOrderComponent::class)->name('userorder');

Route::get('userorderdetails/{order_id}', UserOrderDetailsComponent::class)->name('userorderdetails');

//Review
Route::get('userreview/{order_item_id}', [ReviewController::class, 'vaoformReview']);
Route::post('userreview/addreview',[ReviewController::class,'addReview']);

//Admin Delete User
Route::get('admin/user/list',[UserController::class,'list']);
Route::get('admin/user/delete/{id}',[UserController::class,'delete']);

Route::get('user/profile/view', [UserProfileController::class, 'get']);

Route::get('user/profile/edit',[UserProfileController::class,'edit']);
Route::post('user/profile/editPost/{id}',[UserProfileController::class,'editPost']);


