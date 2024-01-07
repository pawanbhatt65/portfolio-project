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
Route::get('/show-product-content', [ProfileController::class, 'showProductContent'])->name('showProductContent');

Route::group(['prefix' => 'user', 'middleware' => ['web', 'isUser']], function () {
    Route::get('/dashboard', [ProfileController::class, 'userDashboard'])->name('dashboard');
    Route::get('/item-list', [ProfileController::class, 'itemsList'])->name('user.itemsList');
    Route::get('/add-items', [ProfileController::class, 'addItems'])->name('user.addItems');
    Route::post('/store-items', [ProfileController::class, 'storeItems'])->name('user.storeItems');
    Route::get('/edit-item', [ProfileController::class, 'editItems'])->name('user.editItems');
    Route::post('/update-item', [ProfileController::class, 'updateItems'])->name('user.updateItems');
    Route::get('/delete-item', [ProfileController::class, 'deleteItems'])->name('user.deleteItems');
    Route::post('/update-password-send-mail', [ProfileController::class, 'updatePasswordSendMail'])->name('user.updatePasswordSendMail');
    Route::get('/loggedUserShowProductContent', [ProfileController::class, 'loggedUserShowProductContent'])->name('user.loggedUserShowProductContent');

    // restore deleted product
    Route::get('/restore-items', [ProfileController::class, 'restoreItems'])->name('user.restoreItems');

    Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');
});
