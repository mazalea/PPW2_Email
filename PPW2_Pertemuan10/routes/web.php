<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/send-email', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');
