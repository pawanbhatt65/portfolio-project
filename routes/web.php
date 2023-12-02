<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [ProfileController::class, 'home'])->name('home');
Route::get('/about', [ProfileController::class, 'about'])->name('about');
Route::get('/e-commerce', [ProfileController::class, 'eCommerce'])->name('eCommerce');
Route::get('/contact-us', [ProfileController::class, 'contactUs'])->name('contactUs');
Route::post('/contactUsPost', [ProfileController::class, 'contactUsPost'])->name('contactUsPost');
Route::post('/login-E-commerce', [ProfileController::class, 'logInECommerce'])->name('logInECommerce');
Route::post('/register-e-commerce', [ProfileController::class, 'registerECommerce'])->name('registerECommerce');

Route::get('/login', [ProfileController::class, 'loginFunction'])->name('loginFunction');

Route::prefix('/user')->group(['middleware' => ['web', 'isUser']], function () {
    Route::get('/dashboard', [ProfileController::class, 'userDashboard'])->name('user.dashboard');
});
