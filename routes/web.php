<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ProductController;

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

Route::view('/', 'user/index')->name('/');
Route::view('/shop', 'user/shop')->name('user.shop');
Route::view('/shop-detail', 'user/shop_detail')->name('user.shop_detail');
Route::view('/cart', 'user/cart')->name('user.cart');
Route::view('/contact', 'user/contact')->name('user.contact');
Route::view('/blog', 'user/blog')->name('user.blog');
Route::view('/blog-detail', 'user/blog_detail')->name('user.blog_detail');
Route::view('/order', 'user/order')->name('user.order');

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class,'index'])->name('admin.dashboard');

Route::get('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/post-login', [LoginController::class, 'postLogin'])->name('admin.postLogin');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/admin/register', [LoginController::class, 'register'])->name('admin.register');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('admin.home');
    Route::resource('product_type', ProductTypeController::class);
    Route::resource('product', ProductController::class);
});
