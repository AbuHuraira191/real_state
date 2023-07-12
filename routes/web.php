<?php

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
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::get('/agents', [UserController::class, 'agents'])->name('agents');
Route::get('/blog', [UserController::class, 'blog'])->name('blog');
Route::get('/blogdetail', [UserController::class, 'blogdetail'])->name('blogdetail');
Route::get('/buysalerent', [UserController::class, 'buysalerent'])->name('buysalerent');
Route::get('/property-detail', [UserController::class, 'property_detail'])->name('property-detail');
Route::get('/register', [UserController::class, 'register'])->name('register');
