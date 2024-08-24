<?php

use App\Http\Controllers\AvatarShopController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailController;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('home', [HomeController::class, 'viewHome'])->name('home');

Route::prefix('home')->group(function(){
    Route::get('gender/{gender}', [HomeController::class, 'viewByGender'])->name('viewByGender');
    Route::get('hobby/{hobby}', [HomeController::class, 'viewByHobby'])->name('viewByHobby');
});

Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('register', [AuthController::class, 'createRegister'])->name('register');

        Route::post('register', [AuthController::class, 'storeRegister'])->name('storeRegister');

        Route::get('login', [AuthController::class, 'createLogin'])->name('login');

        Route::post('login', [AuthController::class, 'storeLogin'])->name('storeLogin');
    });
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function(){

    Route::get('persondetail/{id}', [DetailController::class, 'viewPersonDetail']) ->name('personDetail');
    Route::get('frienddetail/{id}', [DetailController::class, 'viewFriendDetail']) ->name('friendDetail');

    Route::get('friends', [FriendsController::class, 'viewFriends'] ) ->name('friends');
    Route::post('removefriend', [FriendsController::class, 'removeFriend'] ) ->name('removeFriend');
    Route::post('setvidcalllink', [FriendsController::class, 'setVidcallLink'] ) ->name('setVidcallLink');

    Route::get('payment', [PaymentController::class, 'viewPayment']) ->name('payment');
    Route::post('topup', [PaymentController::class, 'topup']) ->name('topup');
    Route::get('showoff', function(){
        return view('showoff');
    }) ->name('showoff');
    Route::get('settings', [SettingsController::class, 'viewSettings'] ) ->name('settings');
    Route::post('hideprofile', [SettingsController::class, 'hideProfile'])->name('hideProfile');
    Route::post('unhideprofile', [SettingsController::class, 'unhideProfile'])->name('unhideProfile');

    Route::get('avatarshop', [AvatarShopController::class, 'viewAvatarShop']) ->name('avatarshop');
    Route::post('purchaseavatar', [AvatarShopController::class, 'purchaseAvatar']) ->name('purchaseAvatar');


    Route::post('like-others/{idFrom}/{idTo}', [HomeController::class, 'likeOthers'])->name('likeOthers');



});
