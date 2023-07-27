<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    return redirect()->route('index');
});


Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Main Routes
Route::group(['middleware' => 'main'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/login', [UserController::class, 'loginPage'])->name('loginPage');
    Route::post('/login-form', [UserController::class, 'login'])->name('login');
    Route::post('/signup', [UserController::class, 'signup'])->name('signup');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::get('/about', [UserController::class, 'about'])->name('about');
    Route::get('/contact', [UserController::class, 'contact'])->name('contact');
    Route::get('/agents', [UserController::class, 'agents'])->name('agents');
    Route::get('/blog', [UserController::class, 'blog'])->name('blog');
    Route::get('/blogdetail', [UserController::class, 'blogdetail'])->name('blogdetail');
    Route::get('/buysalerent', [UserController::class, 'buysalerent'])->name('buysalerent');
    Route::get('/property-detail', [UserController::class, 'property_detail'])->name('property-detail');

});

// Admin Routes
Route::group(['middleware' => 'admin'], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin_index');
        Route::get('/property-list', [AdminController::class, 'propertyList'])->name('admin_property_list');
        Route::get('/all-sellers', [AdminController::class, 'allSellers'])->name('admin_allSellers');
        Route::get('/delete-sellers/{id}', [AdminController::class, 'deleteSellers'])->name('admin_deleteSeller');
        Route::get('/all-dealers', [AdminController::class, 'allDealers'])->name('admin_allDealers');
        Route::get('/delete-dealers/{id}', [AdminController::class, 'deleteDealer'])->name('admin_deleteDealer');
        Route::get('/all-buyers', [AdminController::class, 'allBuyers'])->name('admin_allBuyers');
        Route::get('/delete-buyers/{id}', [AdminController::class, 'deleteBuyer'])->name('admin_deleteBuyer');
        Route::get('/property-detail/{id}', [AdminController::class, 'propertyDetail'])->name('admin_property_detail');
        Route::get('/property-delete/{id}', [AdminController::class, 'propertyDelete'])->name('admin_property_delete');

    });
});



// Dealer Routes
Route::group(['middleware' => 'dealer'], function () {
    Route::prefix('dealer')->group(function () {

        Route::get('/dashboard', [DealerController::class, 'index'])->name('dealer_index');
        Route::get('/property-detail/{id}', [DealerController::class, 'propertyDetail'])->name('dealer_property_detail');
        Route::get('/property-list', [DealerController::class, 'propertyList'])->name('dealer_property_list');
        Route::get('/leading-properties', [DealerController::class, 'leadingProperties'])->name('dealer_leading_properties');
        Route::get('/property-permissions/{id}', [DealerController::class, 'propertyPermissions'])->name('dealer_property_permissions');
        Route::Post('/property-permissions', [DealerController::class, 'propertyPermissionsStore'])->name('dealer_property_permissions_Store');
        Route::get('/my-sellers', [DealerController::class, 'mySellers'])->name('dealer_my_sellers');
    });
});





// Buyer Routes
Route::group(['middleware' => 'buyer'], function () {

    Route::prefix('buyer')->group(function () {

        Route::get('/dashboard', [BuyerController::class, 'index'])->name('buyer_index');
        Route::get('/bid-Properties', [BuyerController::class, 'bidProperties'])->name('buyer_bid_property');
        Route::get('/property-list', [BuyerController::class, 'propertyList'])->name('buyer_property_list');
        Route::get('/property-detail/{id}', [BuyerController::class, 'propertyDetail'])->name('buyer_property_detail');
        Route::post('/store-bid', [BuyerController::class, 'propertyStoreBid'])->name('buyer_store_bid');

    });

});




// Seller Routes
Route::group(['middleware' => 'seller'], function () {

    Route::prefix('seller')->group(function () {

        Route::get('/dashboard', [SellerController::class, 'index'])->name('seller_index');
        Route::get('/property/{id?}', [SellerController::class, 'addPropertyPage'])->name('seller_add_property');
        Route::post('/property', [SellerController::class, 'addProperty'])->name('seller_submit_property');
        Route::get('/property-detail/{id}', [SellerController::class, 'propertyDetail'])->name('seller_property_detail');
        Route::get('/property-permissions/{id}', [SellerController::class, 'propertyPermissions'])->name('seller_property_permissions');
        Route::Post('/property-permissions', [SellerController::class, 'propertyPermissionsStore'])->name('seller_property_permissions_Store');
        Route::get('/property-assign/{id?}', [SellerController::class, 'propertyAssign'])->name('seller_assign_property');
        Route::post('/property-assign-store', [SellerController::class, 'propertyAssignStore'])->name('seller_assign_property_store');
        Route::get('/property-list', [SellerController::class, 'propertyList'])->name('seller_property_list');
        Route::get('/all-dealers', [SellerController::class, 'dealers'])->name('seller_all_dealers');
        Route::get('/my-dealers', [SellerController::class, 'my_dealers'])->name('seller_my_dealers');
        Route::get('/leading-properties', [SellerController::class, 'leading_properties'])->name('seller_leading_properties');

    });

});
