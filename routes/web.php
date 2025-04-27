<?php

use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StripeController::class, 'index'])->name('stripe.index');
Route::post('/stripe/charge', [StripeController::class, 'charge'])->name('stripe.charge');
