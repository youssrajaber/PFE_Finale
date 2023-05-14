<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PaymentContoller;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
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
//     return view('components.Home');
// });
Route::get('/gogle', function () {
    return redirect()->away('https://www.google.com');
})->name('roton');

// Route::get('/', [HomeController::class, 'home'])->name('homepage');
//->middleware('auth')
Route::get('/', [HomeController::class, 'index'])->name('products');
// add Products
Route::get('/products/create', [HomeController::class, 'create'])->name('create');
Route::post('/products/store', [HomeController::class, 'store'])->name('store');
//show More
Route::get('/products/{id}', [HomeController::class, 'show'])->name('product')->where('id', '\d+');
// /d+ dicimal (+ 1)

Route::get('/loginys', [loginController::class, 'show'])->name('login.show')->middleware('guest');
Route::post('/loginp', [loginController::class, 'login'])->name('loginp')->middleware('guest');

//Login_
Route::get('/createP', [loginController::class, 'create'])->name('login.create');
Route::post('/storeP', [loginController::class, 'store'])->name('login.store');

//LOgout
Route::get('/logout', [loginController::class, 'logout'])->name('logout');

//detail profile
Route::get('/details/{email}/{name}', [loginController::class, 'details'])->name('details');

//delete product
Route::delete('/products/{id}', [HomeController::class, 'destroy'])->name('destroy');
// Update Products
Route::get('/product/{id}', [HomeController::class, 'edit'])->name('edit');
Route::put('/product/{id}', [HomeController::class, 'update'])->name('update');
// -----------------Admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('ADM')->middleware('adminuser');
// AllProducts
Route::get('/admin/products', [AdminController::class, 'AllPrd'])->name('AllPrd');
// AllOrders
Route::get('/admin/orders', [AdminController::class, 'AllOrder'])->name('AllOrder');
// -------------------------
// Panier
Route::get('/cart', [cartController::class, 'show']);
Route::get('/cart/addCart/{id}', [cartController::class, 'store'])->name('add');
Route::get('/cart/affish/', [cartController::class, 'affiche'])->name('affichage');
//
Route::get('/panier', [cartController::class, 'panier'])->name('cart');

// Supprimer  panier

Route::delete('/cart/deleteItem/{id}/{quantite}', [cartController::class, 'deleteItem'])->name('deleteItem');
Route::put('/cart/updateItem/', [cartController::class, 'updateItem'])->name('updateItem');
//Payment
Route::get('/stripe/{totalPrix}', [PaymentContoller::class, 'stripe'])->name('stripe');
Route::post('/stripe/{totalPrix}', [PaymentContoller::class, 'stripePost'])->name('stripe.post');

Route::get('/payment/infoget', [PaymentContoller::class, 'payInfosget'])->name('payInfosget');
Route::post('/payment/info', [PaymentContoller::class, 'payInfos'])->name('payInfos');


Auth::routes();
