<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipController;
use App\Http\Controllers\PaymentController;

Route::get('/', [TipController::class, 'index']);


Route::post('/payment/mpesa', [PaymentController::class, 'mpesaPayment'])->name('mpesa.payment');
Route::post('/payment/mpesa/callback', [PaymentController::class, 'mpesaCallback'])->name('mpesa.callback');
Route::post('/payment/paypal', [PaymentController::class, 'paypalPayment'])->name('paypal.payment');
Route::get('/payment/paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
Route::get('/payment/paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');

Route::get('/', function () {
    return view('welcome');
});
