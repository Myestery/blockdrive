<?php

use App\Http\Controllers\FilemanagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/************************ Dashboard Routes Start ******************************/
Route::group([
    'middleware' => "junoAuth"
], function () {
    Route::group(['as' => 'dashboard.'], function () {
        Route::get('/', [FilemanagerController::class, 'index'])->name('files');
        Route::redirect('/dashboard', '/');
        Route::get('/files', [FilemanagerController::class, 'index'])->name('files');
        Route::get('/shared', [FilemanagerController::class, 'shared'])->name('files.shared');
        Route::get('/shared-folders/{folder}', [FilemanagerController::class, 'public'])->name('files.public')->withoutMiddleware('junoAuth');
    });
});
/************************ Dashboard Routes Ends ******************************/
