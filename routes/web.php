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
Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::get('/agents', [UserController::class, 'agents'])->name('agents');
Route::get('/blog', [UserController::class, 'blog'])->name('blog');
Route::get('/blogdetail', [UserController::class, 'blogdetail'])->name('blogdetail');
Route::get('/buysalerent', [UserController::class, 'buysalerent'])->name('buysalerent');
Route::get('/property-detail', [UserController::class, 'property_detail'])->name('property-detail');
Route::get('/register', [UserController::class, 'register'])->name('register');


// Admin Routes
Route::group(['middleware' => 'admin'], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin_index');

    });
});



// Dealer Routes
Route::group(['middleware' => 'dealer'], function () {
    Route::prefix('dealer')->group(function () {

        Route::get('/', [DealerController::class, 'index'])->name('dealer_index');

    });
});





// Buyer Routes
Route::group(['middleware' => 'buyer'], function () {

    Route::prefix('buyer')->group(function () {

        Route::get('/', [BuyerController::class, 'index'])->name('buyer_index');

    });

});




// Seller Routes
Route::group(['middleware' => 'seller'], function () {

    Route::prefix('seller')->group(function () {

        Route::get('/', [SellerController::class, 'index'])->name('seller_index');
        Route::get('/property', [SellerController::class, 'addPropertyPage'])->name('seller_add_property');

    });

});
