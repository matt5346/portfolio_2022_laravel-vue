<?php

use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::post('/mail/contact/form', [\App\Http\Controllers\EmailController::class,'submit']);


Route::get('/portfolio/demo/krypto', [\App\Http\Controllers\KryptoController::class,'index']);
Route::get('/portfolio/demo/shamel', [\App\Http\Controllers\ShamelController::class,'index']);
Route::get('/admin/{any}', [\App\Http\Controllers\AdminRoleController::class,'index'])->where('any', '.*');
Route::get('/admin{any}',  [\App\Http\Controllers\AdminRedirectController::class,'index'])->where('any', '.*');
Route::get('/en/admin{any}',  [\App\Http\Controllers\AdminRedirectController::class,'index'])->where('any', '.*');
Route::get('/ru/admin{any}',  [\App\Http\Controllers\AdminRedirectController::class,'index'])->where('any', '.*');

Route::get('/{any}',  [\App\Http\Controllers\VueController::class,'index'])->where('any', '^(?!api).*$');

// Route::post('/mail/contact/form', [\App\Http\Controllers\EmailController::class,'submit']);
// Route::get('mail', function () {
//     $order = App\Order::find(1);

//     return (new App\Notifications\StatusUpdate($order))
//         ->toMail($order->user);
// });