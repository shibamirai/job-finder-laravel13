<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'portfolios')->name('home');

Route::prefix('auth')->group(function() {
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'create')->name('login')->middleware('guest');
        Route::post('login', 'store')->middleware('guest');
        Route::post('logout', 'destroy')->name('logout')->middleware('auth');
    });
});

Route::prefix('portfolios')->group(function() {
    Route::controller(PortfolioController::class)->group(function() {
        Route::get('', 'index')->name('portfolios.index');
        Route::get('{jobFinder}', 'show')->name('portfolios.show');
    });
});

Route::get('statistics', [StatisticController::class, 'index'])->name('statistics');
