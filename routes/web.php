<?php

use App\Http\Controllers\JobFinderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\WorkController;
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

Route::middleware('auth')->group(function () {
    Route::prefix('job-finders')->group(function() {
        Route::controller(JobFinderController::class)->group(function() {
            Route::get('', 'index')->name('job-finders.index');
            Route::get('create', 'create')->name('job-finders.create');
            Route::post('', 'store')->name('job-finders.store');
            Route::get('{jobFinder}/edit', 'edit')->name('job-finders.edit');
            Route::patch('{jobFinder}', 'update')->name('job-finders.update');
            Route::delete('{jobFinder}', 'destroy')->name('job-finders.destroy');
        });
        Route::controller(WorkController::class)->group(function() {
            Route::get('{jobFinder}/works/create', 'create')->name('works.create');
            Route::post('{jobFinder}/works', 'store')->name('works.store');
            Route::get('{jobFinder}/works/{work}/edit', 'edit')->name('works.edit');
            Route::patch('{jobFinder}/works/{work}', 'update')->name('works.update');
            Route::delete('{jobFinder}/works/{work}', 'destroy')->name('works.destroy');
        });
    });
    Route::prefix('occupations')->group(function() {
        Route::controller(OccupationController::class)->group(function() {
            Route::get('', 'index')->name('occupations.index');
            Route::post('', 'store')->name('occupations.store');
            Route::patch('{occupation}', 'update')->name('occupations.update');
            Route::delete('{occupation}', 'destroy')->name('occupations.destroy');
        });
    });
});
