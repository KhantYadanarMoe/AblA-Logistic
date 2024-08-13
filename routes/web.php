<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [UserController::class, 'index']);

Route::get('/about', [UserController::class, 'about'])->middleware('auth');

Route::get('/products', [UserController::class, 'products'])->middleware('auth');

Route::get('/contact', [UserController::class, 'contact'])->middleware('auth');
Route::post('/contact', [UserController::class, 'storeContact'])->middleware('auth');

Route::get('/cart', [UserController::class, 'cart'])->middleware('auth');
Route::post('/add-to-cart', [UserController::class, 'addToCart'])->middleware('auth');
Route::get('/remove-from-cart/{id}', [UserController::class, 'removeFromCart'])->middleware('auth');

Route::post('/order', [UserController::class, 'storeOrder'])->middleware('auth');

Route::get('/user-info', [UserController::class, 'userInfo'])->middleware('auth');
Route::post('/user-info', [UserController::class, 'createUserInfo'])->middleware('auth');

Route::get('/wishlist', [UserController::class, 'wishlist'])->middleware('auth');
Route::post('/add-to-wishlist', [UserController::class, 'addToWishlist'])->middleware('auth');

Route::get('/order-history', [UserController::class, 'orderHistory'])->middleware('auth');
Route::get('order-history/{orderId}/details', [UserController::class, 'userOrderDetail'])->name('admin.order_details');;
Route::get('order-history/{completed:c_id}/completed/details', [UserController::class, 'showCompletedOrderDetail']);

// --------------- end user-interface ---------------
Route::middleware('can:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);

    Route::get('/admin/products', [AdminController::class, 'products']);

    Route::get('/admin/products/create', [AdminController::class, 'createProducts']);
    Route::post('/admin/products/create', [AdminController::class, 'storeProducts']);
    Route::get('/admin/products/{product:id}/edit', [AdminController::class, 'editProducts']);
    Route::patch('/admin/products/{product:id}/update', [AdminController::class, 'updateProducts']);
    Route::delete('/admin/products/{product:id}/delete', [AdminController::class, 'destroyProducts']);

    Route::get('/admin/users', [AdminController::class, 'users']);

    Route::get('/admin/contacts', [AdminController::class, 'contacts']);
    Route::get('/admin/contacted', [AdminController::class, 'contacted']);
    Route::post('/contact-done/{id}', [AdminController::class, 'contactDone']);

    Route::get('/admin/orders', [AdminController::class, 'orders']);

    Route::get('/admin/orders/{order:id}/details', [AdminController::class, 'order']);
    

    Route::get('/admin/orders/completed', [AdminController::class, 'completedOrder']);
    Route::post('/admin/order/{order:id}/completed', [AdminController::class, 'deliverOrder']);
    Route::get('admin/orders/{completed:c_id}/completed/details', [AdminController::class, 'showCompletedOrderDetail']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
