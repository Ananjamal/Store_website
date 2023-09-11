<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('layouts.frontEnd.app');
// });
Route::get('/', App\Http\Livewire\Website\Home::class)->name('home');
Route::get('/shop', App\Http\Livewire\Website\Shop\Shop::class)->name('shop');
Route::get('/category/{id}/products', App\Http\Livewire\Website\Shop\ProductsCategory::class)->name('products-category');

Route::get('/about', App\Http\Livewire\Website\About\About::class)->name('about');
Route::get('/contact', App\Http\Livewire\Website\Contact\Contact::class)->name('contact');
Route::get('/cart', App\Http\Livewire\Website\Cart\Carts::class)->name('cart');
Route::get('/favorites', App\Http\Livewire\Website\Favorite\Favorites::class)->name('favorites');
Route::get('/checkout', App\Http\Livewire\Website\checkout\checkout::class)->name('checkout')->middleware('auth');
Route::get('/orders', App\Http\Livewire\Website\Orders\Orders::class)->name('UserOrders')->middleware('auth');
Route::get('/order/{id}/details', App\Http\Livewire\Website\Orders\OrderDetails::class)->name('UserOrderDetails')->middleware('auth');

Route::get('/product/{id}/details', App\Http\Livewire\Website\Details\productDetails::class)->name('productDetails');

Route::get('/info', function () {
    return view('admininfo');
})
    ->middleware(['auth', 'verified'])
    ->name('Info');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('admin/dashborad', \App\Http\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('admin/categories', App\Http\Livewire\Admin\Categories\Categories::class)->name('categories');
    Route::get('admin/products', App\Http\Livewire\Admin\Products\Products::class)->name('products');
    Route::get('admin/orders', App\Http\Livewire\Admin\Orders\Orders::class)->name('orders');
    Route::get('admin/order/{id}/details', App\Http\Livewire\Admin\Orders\OrderDetails::class)->name('ordersDetails');


});
