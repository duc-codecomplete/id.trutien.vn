<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;

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

Route::get('/dang-ky', [HomeController::class, 'signup']);
Route::get('/dang-nhap', [HomeController::class, 'signin'])->name("login");

Route::post('/dang-ky', [HomeController::class, 'signupPost']);
Route::post('/dang-nhap', [HomeController::class, 'signinPost']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home'])->name("home");
	Route::get('/update_char', [HomeController::class, 'updateChar'])->name("update_char");
	Route::post('/set_main_char', [HomeController::class, 'setMainChar']);
	Route::get('/set_main_char/{id}', [HomeController::class, 'setMainCharHome']);
    Route::get('/logout', function() {
		Auth::logout();
		return redirect("/dang-nhap");
	});

	Route::get('/knb', [HomeController::class, 'getKnb'])->name("knb");
	Route::post('/knb', [HomeController::class, 'postKnb']);

	Route::get('/nap-tien', [HomeController::class, 'getNapTien'])->name("payment");
	Route::get('/shops', [HomeController::class, 'getShop'])->name("shops");
	Route::post('/shops', [HomeController::class, 'postShop']);

	Route::get('/giftcodes', [HomeController::class, 'getGiftCode'])->name("giftcodes");
	Route::get('/giftcodes/{id}/using', [HomeController::class, 'useGiftCode']);
	Route::get('/transactions', [HomeController::class, 'transactions'])->name("transactions");

	Route::get('/doi-mat-khau', [HomeController::class, 'getPassword'])->name("password");
	Route::post('/doi-mat-khau', [HomeController::class, 'postPassword']);
});


