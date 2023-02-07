<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

// Routes for "Admin" (with middleware 'admin.redirect')
Route::group([ 'middleware' => 'admin.redirect' ], function(){
    Route::get('admin/login',[AdminAuthController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('admin/login',[AdminAuthController::class, 'login'])->name('login');
});

// ------------------------------------------------ 


// Routes for Admin Pages (with middleware 'admin')
Route::group([ 'middleware' => 'admin' ], function(){
    Route::get('dashboard',[AdminPageController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Pages
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('admins', AdminController::class);
    // Status update GET
    Route::get('update-status/{id}', [AdminController::class, 'updateStatus'])->name('update.status');
});



/**
 * Test Routes
 */
