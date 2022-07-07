<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Localization;

Debugbar::enable();

Route::group(['prefix' => Localization::getLocale()], function() {

    Route::get('/', function () {
        return view('pages.index');
    })->name('home');

    Auth::routes();

    //Выйти
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::middleware(['role:user|admin'])->prefix('cabinet')->group(function (){
        Route::get('/', [App\Http\Controllers\User\HomeController::class, 'show'])->name('cabinet.home');
    });

    Route::middleware(['role:admin'])->prefix('billing')->group(function (){
        Route::get('/', [App\Http\Controllers\Billing\HomeController::class, 'show'])->name('billing.home');
    });
});
