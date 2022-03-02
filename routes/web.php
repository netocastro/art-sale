<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminRequestsController;
use App\Http\Controllers\Site\Requests;
use App\Http\Controllers\Site\Web;
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

/** Web */
Route::get('/', [Web::class, 'home'])->name('web.home');
Route::get('/contato', [Web::class, 'contact'])->name('web.contact');
Route::get('/login', [Web::class, 'login'])->name('web.login');
Route::get('/portifolio', [Web::class, 'portifolio'])->name('web.portifolio');
Route::get('/registro', [Web::class, 'register'])->name('web.register');
Route::get('/loja', [Web::class, 'store'])->name('web.store');
Route::get('/loja/{artName}', [Web::class, 'artSell'])->name('web.artSell');

/** Requests */
Route::post('/login', [Requests::class, 'login'])->name('request.login');
Route::post('/register', [Requests::class, 'register'])->name('request.register');
Route::post('/contact', [Requests::class, 'contact'])->name('request.contact');
Route::post('/read', [Requests::class, 'login'])->name('request.read');

/** 
 * Admin 
 */
Route::prefix('admin')->group(function () {
    /** Web */
    //Route::get('/lista-contatos', [Admin::class, 'contactList'])->name('admin.contactList');
   // Route::get('/lista-pedidos', [Admin::class, 'orderList'])->name('admin.orderList');
    //Route::get('/lista-pedidos', [Admin::class, 'orderList'])->name('admin.orderList');
    Route::get("/uploadStore", [AdminController::class, 'uploadStore'], "admin.uploadStore");

    /** Request */
    Route::post("/uploadStore", [AdminRequestsController::class, 'uploadStore'])->name("admin.request.uploadStore");
});


/*$router->post("/debug", "Request:debug", "art.request.debug");
$router->post("/register", "Request:register", "art.request.register");
$router->post("/login", "Request:login", "art.request.login");
$router->post("/contact", "Request:contact", "art.request.contact");
$router->post("/deleteImage", "Request:deleteImage", "art.request.deleteImage");
$router->post("/request", "Request:request", "art.request.request");
$router->post("/read", "Request:read", "art.request.read");
$router->post("/deleteContact", "Request:deleteContact", "art.request.deleteContact");
$router->post("/checkout", "Request:checkout", "art.request.checkout");
$router->post("/checkoutPayPal", "Request:checkoutPayPal", "art.request.checkoutPayPal");
$router->post("/paymentPayPal", "Request:paymentPayPal", "art.request.paymentPayPal");*/




