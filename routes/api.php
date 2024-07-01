<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/update_char', [AuthController::class, 'updateCharApi'])->name("update_char");

Route::post('/payment/success', [HomeController::class, 'paymentSuccess'])->name("paymentSuccess");

Route::get('/update_name', [AuthController::class, 'updateNameApi'])->name("updateNameApi");
Route::get('/bot', [AuthController::class, 'bot'])->name("bot");
