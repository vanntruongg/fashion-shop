<?php

use App\Http\Controllers\CartContronller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckOutContronller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;

use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\PortfolioConTroller;
use App\Http\Controllers\Admin\User\UserController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
//product
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/product/detail/{id}', [ProductsController::class, 'product_detail'])->name('products.detail');

//contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// cart
Route::get('/cart', [CartContronller::class, 'index'])->name('cart');
Route::post('/cart/add', [CartContronller::class, 'requestAddProduct'])->name('cart.add');

Route::post('/update-quantity-cart', [CartContronller::class, 'updateQuantity']);
//checkout
Route::get('/checkout', [CheckOutContronller::class, 'index'])->name('checkout');
Route::post('/create-order', [CheckOutContronller::class, 'createOrder'])->name('create-order');

//admin routes 
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
Route::get('/admin/product', [AdminController::class, 'product'])->name('admin-product');
Route::get('/admin/categoryproduct', [AdminController::class, 'category'])->name('admin-category');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin-users');
Route::get('/admin/product/new-product', [ProductController::class, 'newProduct'])->name('new-product');
Route::get('/admin/product/new-category', [CategoryController::class, 'newCategory'])->name('new-category');
Route::get('/admin/product/new-portfolio', [PortfolioConTroller::class, 'newPortfolio'])->name('new-portfolio');
Route::get('/admin/users/new-users', [UserController::class, 'newUser'])->name('new-users');