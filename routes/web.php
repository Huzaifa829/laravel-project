<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DHLController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaveForLaterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/category/{slug}', [CategoryController::class, 'categories'])->name('categories');
Route::get('/product/{slug}', [ShopController::class, 'singleproduct'])->name('single-product');
Route::get('/allbrands', [BrandController::class, 'allbrands'])->name('allbrands');
Route::get('/brand/{slug}', [BrandController::class, 'brandproduct'])->name('brands');
Route::get('suggestion-search/{slug}','App\Http\Controllers\SearchController@searchsuggestion');
Route::get('/check-out',[CheckoutController::class,'checkoutorder'])->middleware(['auth', 'verified'])->name('cart.checkoutorder');
Route::get('/guestcheckout',[CheckoutController::class,'guestCheckout'])->name('cart.guestcheckout');
Route::post('/checkoutpayment',[CheckoutController::class,'checkoutpayment'])->middleware(['auth','verified'])->name('cart.checkoutpayment');
Route::get('/shipping',[CheckoutController::class,'shipping'])->middleware(['auth', 'verified'])->name('cart.shipping');
Route::get('/payment',[CheckoutController::class,'payment'])->middleware(['auth', 'verified'])->name('cart.payment');
Route::get('/review',[CheckoutController::class,'orderreview'])->middleware(['auth', 'verified'])->name('cart.review');
Route::get('/thankyou',[CheckoutController::class,'thankyou'])->middleware(['auth', 'verified'])->name('cart.thankyou');
Route::get('/cartData',[ShopController::class,'cartData'])->middleware(['auth','verified'])->name('cart.getcartdata');
Route::post('/cartupdate',[ShopController::class,'updatecart'])->name('cart.updateproduct');

Route::get('/search/{id}',[SearchController::class,'search'])->name('search');

Route::get('/wishlist', function () {return view('pages.wishlist');})->middleware(['auth', 'verified'])->name('wishlist');
Route::get('/cart',[CheckoutController::class,'cart'])->name('cart');
Route::post('/add-to-cart', [ShopController::class, 'store'])->name('addtocart');
Route::get('/about', function () {return view('pages.about');})->name('about');
Route::get('/contact', function () {return view('pages.contact');})->name('contact');
Route::get('/dashboard', [ProfileController::class,'dashboard'])->middleware(['auth', 'verified'])->name('user.dashboard');
Route::get('/profile', function () {return view('user.profile.profile');})->middleware(['auth', 'verified'])->name('user.profile');
Route::post('/update-profile', [ProfileController::class,'updateprofile'])->middleware(['auth', 'verified'])->name('user.update-profile');
Route::get('/orders', [ProfileController::class,'orderhistory'])->middleware(['auth', 'verified'])->name('user.orders');
Route::get('/orderdetails/{id}', [ProfileController::class,'orderdetails'])->middleware(['auth', 'verified'])->name('user.orderdetails');
Route::get('/address', [ProfileController::class,'getaddress'])->middleware(['auth', 'verified'])->name('user.address');
Route::get('/add-address', [ProfileController::class,'addaddress'])->middleware(['auth', 'verified'])->name('user.add-address');
Route::post('/add-addressdata', [ProfileController::class,'addaddressdata'])->middleware(['auth', 'verified'])->name('user.add-addressdata');
Route::get('/edit-addressdata/{id}', [ProfileController::class,'edituseraddress'])->middleware(['auth', 'verified'])->name('user.edituseraddress');
Route::post('/update-addressdata', [ProfileController::class,'updateaddress'])->middleware(['auth', 'verified'])->name('user.updateaddress');
Route::get('/password', function () {return view('user.profile.password');})->middleware(['auth', 'verified'])->name('user.password');
Route::post('/update-password', [ProfileController::class,'updatePassword'])->middleware(['auth', 'verified'])->name('user.updatepassword');
Route::get('/track-order',function(){return view('user.orders.track');})->name('user.trackorder');



Route::get('/getSingleShipment',[DHLController::class,'getSingleProductRate'])->name('dhl.getSingleShipment');
Route::get('/getMultiShipmentRates',[DHLController::class,'getMultiProductRate'])->name('dhl.getMultiShipmentRates');
Route::get('getLandedCast',[DHLController::class,'getLandedCast'])->name('dhl.getLandedCast');
Route::get('getDhlAvailableServices',[DHLController::class,'getDhlAvailableServices'])->name('dhl.getDhlAvailableServices');
Route::post('createShipment',[DHLController::class,'createShipment'])->name('dhl.createShipment');
Route::get('trackSingleShipment',[DHLController::class,'trackSingleShipment'])->name('dhl.trackSingleShipment');
Route::get('trackMultipleShipment',[DHLController::class,'trackMultipleShipment'])->name('dhl.trackMultipleShipment');
Route::get('validatePickupAddress',[DHLController::class,'validatePickupAddress'])->name('dhl.validatePickupAddress');


Route::get('/notfound',function(){return view('pages.notfound');})->name('notfound');
Route::get('/compare',function(){
    return view('shop.compare');
});

Route::get('/delivery', function () {return view('pages.delivery');})->name('delivery');
Route::get('/privacy', function () {return view('pages.privacypolicy');})->name('privacy');
Route::get('/returns', function () {return view('pages.returns');})->name('returns');
Route::get('/sitemap', function () {return view('pages.sitemap');})->name('sitemap');
Route::get('/terms', function () {return view('pages.terms');})->name('terms');

Route::get('success',[CheckoutController::class,'success'])->name('checkout.success');
Route::get('failure',[CheckoutController::class,'failure'])->name('checkout.failure');

Route::post('/add-to-wishlist', [ShopController::class, 'addtowishlist'])->middleware(['auth', 'verified'])->name('product.addtowishlist');
Route::delete('cart/{product}', [ShopController::class, 'destroy'])->name('cart.destroy');

Route::delete('saveForLater/{product}', [SaveForLaterController::class, 'destroy'])->name('SaveForLater.destroy');
Route::post('saveForLater/switchToCart/{product}', [SaveForLaterController::class, 'switchToCart'])->name('SaveForLater.switchToCart');
Route::post('cart/switchToSaveForLater/{product}', [SaveForLaterController::class, 'saveForLater'])->name('cart.saveForLater');

require __DIR__ . '/auth.php';
