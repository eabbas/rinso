<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageCategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MahdiTestController;
use App\Http\Controllers\MenuController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/scratch', function (Request $request) {
    return view('abbasScratch.index');
});
Route::get('/api/order/remove/{orderId}/{userId}/{careerId}', [OrderController::class, 'remove']);
Route::post('/special-user-store', [SpecialUserController::class, 'store']);
// Route::post('/special-user-page/{page_id}', [SpecialUserController::class, 'userPage']);
// Route::get('/special-user-page/{page_id}', function(){
//     return "صفحه باشگاه مشتریان";
// });
Route::post('/cart/store', [CartController::class, 'store']);
Route::post('/cart/update', [CartController::class, 'update']);
Route::post('/cart/showCarts', [CartController::class, 'showCarts']);
Route::post('/cart/delete', [CartController::class, 'delete']);
Route::post('/cart/deleteAll', [CartController::class, 'deleteAll']);
Route::post('/order/show', [OrderController::class, 'show']);
Route::post('/order/store', [OrderController::class, 'store']);
Route::get('/order/remove/{order}/{user?}/{career?}', [OrderController::class, 'remove']);
Route::get('/order/showItems/{order}', [OrderController::class, 'showItems']);
Route::post('/user/setAddress', [UserController::class, 'setAddress']);
Route::post('/order/acceptOrder', [OrderController::class, 'acceptOrder']);
Route::get('/order/delete/{order}/{user?}/{career?}', [OrderController::class, 'delete']);
Route::get('/menu/showMenuClient/{menu}', [MenuController::class, 'showMenuClient']);
Route::post('/checkUserName', [PagesController::class, 'checkUserName']);
Route::post('/checkUserNameFromEdit', [PagesController::class, 'checkUserNameFromEdit']);

Route::post('/updatePageCategory/{category}', [PageCategoryController::class, 'update']);
Route::get('/deletePageCategory/{category}', [PageCategoryController::class, 'delete']);
Route::post('/deleteAllPageCategory', [PageCategoryController::class, 'deleteAll']);

Route::post('/store-log', [ClientController::class, 'storeLog'])->name('store.log');
Route::post('/user/checkFromMenu', [UserController::class, 'checkFromMenu'])->withoutMiddleware([UserMiddleware::class]);

Route::post('/loginWithActivationCode', [UserController::class, 'loginWithActivationCode']);
Route::post('/removeActivationCode', [UserController::class, 'removeActivationCode']);