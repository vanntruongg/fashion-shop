<?php

use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\product\ImportwarehouseController;
use App\Http\Controllers\CartContronller;
use App\Http\Controllers\CheckOutContronller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;

use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\PortfolioConTroller;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StatisticsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;



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

Route::get('/product/delete/{id}', [CartContronller::class, 'deleteProduct'])->name('products.delete');

Route::get("/search", [ProductsController::class, 'search'])->name("user-search-product");

//contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// cart
Route::get('/cart', [CartContronller::class, 'index'])->name('cart');
Route::post('/cart/add', [CartContronller::class, 'requestAddProduct'])->name('cart.add');

Route::post('/update-quantity-cart', [CartContronller::class, 'updateQuantity']);
//checkout
Route::get('/get-checkout', [CheckOutContronller::class, 'getProducts'])->name('checkout');
Route::post('/checkout', [CheckOutContronller::class, 'index'])->name('checkout');
Route::post('/create-order', [CheckOutContronller::class, 'createOrder'])->name('create-order');
Route::post('/handle-checkout', [CheckOutContronller::class, 'handleCheckout'])->name('handle-checkout');
Route::get('/order-success', [CheckOutContronller::class, 'orderSuccess'])->name('order-success');
//admin routes 

//Auth
//Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Register
Route::get('/register', [AuthController::class, 'registerview'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//fake user
Route::get('/fakeuser', function () {
    $user = new \App\Models\User;
    $user->ND_Ho = 'le';
    $user->ND_Ten = 'hung';
    $user->email = 'lehung@gmail.com';
    $user->ND_SDT = '0354324624';
    $user->password = bcrypt('12345');
    $user->ND_VT = '1';
    $user->save();

    $user1 = new \App\Models\User;
    $user1->ND_Ho = 'le';
    $user1->ND_Ten = 'hung1';
    $user1->email = 'lehung1@gmail.com';
    $user1->ND_SDT = '0354324625';
    $user1->password = bcrypt('12345');
    $user1->ND_VT = '2';
    $user1->save();


});

//Route 403
Route::get('/403', function () {
    return view('pages.403');
})->name('403');
//Admin

Route::prefix('/admin')->middleware('auth.admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('/product', [AdminController::class, 'product'])->name('admin-product');
    Route::get('/categoryproduct', [AdminController::class, 'category'])->name('admin-category');
    Route::get('/portfolio', [AdminController::class, 'portfolio'])->name('admin-portfolio');
    Route::get('/users', [AdminController::class, 'users'])->name('admin-users');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin-orders');
    //product
    Route::get('/product/new-product', [ProductController::class, 'newProduct'])->name('new-product');
    Route::post('/product/new-product', [ProductController::class, 'createProduct']);
        //update product
    Route::get('product/{id}/update-product', [ProductController::class, 'getUpdateProduct'])->name('update-product');
    Route::post('product/{id}/update-product', [ProductController::class, 'postUpdateProduct']);
        //delele product
    Route::post('delele-product', [ProductController::class, 'delete'])->name('delete-product');
        //search
    Route::get('search-product', [ProductController::class, 'searchProduct'])->name('search-product');
    //category
        //create
    Route::get('/product/new-category', [CategoryController::class, 'newCategory'])->name('new-category');
    Route::post('/product/new-category', [CategoryController::class, 'createCategory']);
        //update
    Route::get('category/{id}/update-category', [CategoryController::class, 'getUpdateCategory'])->name('update-category');
    Route::post('category/{id}/update-category', [CategoryController::class, 'updateCategory']);
        //delete
    Route::post('delele-category', [CategoryController::class, 'delete'])->name('delete-category');
    //portfolio
        //create
    Route::get('/product/new-portfolio', [PortfolioConTroller::class, 'newPortfolio'])->name('new-portfolio');
    Route::post('/product/new-portfolio', [PortfolioConTroller::class, 'createPortfolio']);
        //update
    Route::get('portfolio/{id}/update-portfolio', [PortfolioConTroller::class, 'getUpdatePortfolio'])->name('update-portfolio');
    Route::post('portfolio/{id}/update-portfolio', [PortfolioConTroller::class, 'updatePortfolio']);
        //delele
    Route::post('delele-portfolio', [PortfolioConTroller::class, 'delete'])->name('delete-portfolio');
    //users
        //create
    Route::get('/users/new-users', [UserController::class, 'newUser'])->name('new-users');
    Route::post('/users/new-users', [UserController::class, 'createUsers']);
        //update
    Route::get('/users/{id}/update-users', [UserController::class, 'getupdateUsers'])->name('update-users');
    Route::post('/users/{id}/update-users', [UserController::class, 'updateUsers']);
        //delete
    Route::post('delele-user', [UserController::class, 'delete'])->name('delete-user');
        //search
    Route::get('search-users', [UserController::class,'searchUser'])->name('search-users');

    //orders
    Route::get('/orders/{id}/order_details', [OrderController::class, 'getOrderdetails'])->name('order_details');
        //delete
    Route::post('delele-order', [OrderController::class, 'delete'])->name('delete-order');

    //hoadonnhap
    Route::get('/importwarehouse', [ImportwarehouseController::class, 'importWarehouse'])->name('admin-importwarehouse');
        //details 
    Route::get('/importwarehouse/{id}/details', [ImportwarehouseController::class, 'getImportwarehouseDetails'])->name('importwarehouse-details');
        //create
    Route::get('/importwarehouse/new-importwarehouse',[ImportwarehouseController::class, 'newImportwarehouse'])->name('new-importwarehouse');
    Route::post('/importwarehouse/new-importwarehouse',[ImportwarehouseController::class, 'createImportwareHouse']);
        //update
    Route::get('/importwarehouse/{id}/update',[ImportwarehouseController::class, 'getUpdateimportwarehouse'])->name('update-importwarehouse');
    Route::post('/importwarehouse/{id}/update',[ImportwarehouseController::class, 'updateImportwarehouse']);
        //delete
    Route::post('/delele-importwarehouse', [ImportwarehouseController::class, 'deleteImportwarehouse'])->name('delete-importwarehouse');
    
    Route::get('/last-week', [StatisticsController::class, 'dataLastWeek']);
    Route::get('/last-seven-days', [StatisticsController::class, 'dataLastSevenDays']);
    Route::post('/period', [StatisticsController::class, 'dataPeriod']);
});

