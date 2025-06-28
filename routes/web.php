<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\CetakJamaahController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranHajiController;


Route::get('/pendaftaran-haji', [PendaftaranHajiController::class, 'showForm'])->name('show.form');
Route::post('/pendaftaran-haji', [PendaftaranHajiController::class, 'submitForm'])->name('submit.form');
Route::resource('produks', ProdukController::class);
Route::resource('kategoris', KategoriController::class);
Route::resource('orders', OrderController::class);
Route::resource('payments', PaymentController::class);
Route::get('pembayaran/{id}', [PaymentController::class, 'pembayaran_view'])->name('pembayaran_view');
Route::post('payement_store', [PaymentController::class, 'payement_store'])->name('simpan_pembayaran');
Route::resource('pembelis', PembeliController::class);
Route::resource('pendaftaranhajis', PendaftaranHajiController::class);
Route::resource('pengirimans', PengirimanController::class);
Route::resource('reviews', ReviewController::class);
Route::post('reviews-store', [ReviewController::class, 'review_simpan'])->name('review.post');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('profile', [AuthController::class, 'profile'])->name('profile');
Route::get('index', [LandingpageController::class, 'index'])->name('index');
Route::get('filtered', [ReviewController::class, 'filter_review']);

Route::post('payments-approve/{id}', [PaymentController::class, 'payment_approve'])->name('payments.approve');
// rute testing halaman
Route::get('test-admin-page', function () {
    return view('layouts.layouts');
});

Route::get('test-tampilan-payment', function () {
    return view('pembayaran');
});

Route::get('test-checkout-page', function () {
    return view('checkout');
});

// // Menampilkan keranjang
// Route::get('/cart', function () {
//     return view('cart.index');
// })->name('cart.index');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear'); // Opsional
Route::get('order-list', [OrderController::class, 'order_list'])->name('order.list');
Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
// Route::post('/order/pay', [OrderController::class, 'pay'])->name('order.pay');
Route::post('/order/pay', [OrderController::class, 'pay'])->name('order.pay');
Route::get('cetak-pdf', [CetakJamaahController::class, 'cetakPDF'])->name('cetak.pdf');
Route::get('cetak-pdf-by/{id}', [CetakJamaahController::class, 'cetak_jamaah_by_id'])->name('pembelian.cetakbyid');
// Route::post('/checkout/pay', [OrderController::class, 'pay'])->name('order.pay');
// Route::post('/payment/store', [PaymentController::class, 'store'])->name('payement_store');
// Kirim ke halaman form konfirmasi pembayaran
Route::post('/checkout/confirm', [OrderController::class, 'redirectToPayment'])->name('checkout.to_payment');

// Menyimpan ke DB payment
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payement_store');

Route::resource("users", UserController::class);
Route::resource('roles', RoleController::class);

Route::get('/order/success', [OrderController::class, 'success'])->name('success.success');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');


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
//     return view('welcome');
// });

Route::get('success', function () {
    return view('success.success');
});

Route::get('/landing', [LandingpageController::class, 'index'])->name('landing-page');
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
