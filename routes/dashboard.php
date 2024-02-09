<?php

use App\Http\Controllers\FilemanagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/************************ Dashboard Routes Start ******************************/
Route::group([
    'middleware' => "junoAuth"
], function () {
    Route::group(['as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'demoTwo'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'demoTwo'])->name('demo_two');
        Route::get('/files', [FilemanagerController::class, 'index'])->name('files');
    });
});
/************************ Dashboard Routes Ends ******************************/
