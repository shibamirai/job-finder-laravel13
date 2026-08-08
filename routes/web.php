<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'portfolios')->name('home');

Route::prefix('portfolios')->group(function() {
    Route::controller(PortfolioController::class)->group(function() {
        Route::get('/', 'index')->name('portfolios.index');
    });
});