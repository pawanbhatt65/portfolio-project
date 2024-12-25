<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
//  Route::get('/run-command', function () {
//     Artisan::call('optimize:clear');
//     return 'Migration ran successfully!';
// });

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/e-commerce', [MainController::class, 'eCommerce'])->name('eCommerce');
    Route::get('/contact-us', [MainController::class, 'contactUs'])->name('contactUs');
    Route::post('/contactUsPost', [MainController::class, 'contactUsPost'])->name('contactUsPost');
    Route::post('/login-E-commerce', [AuthController::class, 'logInECommerce'])->name('logInECommerce');
    Route::post('/register-e-commerce', [AuthController::class, 'registerECommerce'])->name('registerECommerce');
    Route::get('/show-product-content', [MainController::class, 'showProductContent'])->name('showProductContent');
    Route::get('/verify-mail', [AuthController::class, 'verifyMail'])->name('verifyMail');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
    Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset-password', [AuthController::class, 'resetPasswordPost'])->name('resetPasswordPost');
});

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

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
