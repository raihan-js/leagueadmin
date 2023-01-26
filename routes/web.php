<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPageController;
use Illuminate\Support\Facades\Route;

// Routes for "Admin" (with middleware 'admin.redirect')
Route::group([ 'middleware' => 'admin.redirect' ], function(){
    Route::get('admin/login',[AdminAuthController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('admin/login',[AdminAuthController::class, 'login'])->name('login');
});


// Routes for Admin Pages (with middleware 'admin')
Route::group([ 'middleware' => 'admin' ], function(){
    Route::get('dashboard',[AdminPageController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

