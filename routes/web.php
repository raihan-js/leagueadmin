<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\League\LeagueController;
use App\Http\Controllers\Schedule\MasterScheduleController;
use App\Http\Controllers\Schedule\WeeklyScheduleController;
use App\Http\Controllers\Team\TeamController;
use Illuminate\Support\Facades\Route;


// Redirection
Route::get('/', function () {
    return redirect('dashboard');
});


// Routes for "Admin" (with middleware 'admin.redirect')
Route::group([ 'middleware' => 'admin.redirect' ], function(){
    Route::get('/login',[AdminAuthController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('/login',[AdminAuthController::class, 'login'])->name('login');
});

// ------------------------------------------------ 


// Routes for Admin Pages (with middleware 'admin')
Route::group([ 'middleware' => 'admin' ], function(){
    Route::get('dashboard',[AdminPageController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('account', [AdminPageController::class, 'showAdminAccount'])->name('admin.account');
    Route::get('account/notifications', [AdminPageController::class, 'showAdminNotifications'])->name('admin.notifications');
    Route::get('account/connections', [AdminPageController::class, 'showAdminConnections'])->name('admin.connections');

    // Pages
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('leagues', LeagueController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('masterschedules', MasterScheduleController::class);
    Route::resource('weeklyschedules', WeeklyScheduleController::class);
    // Master schedule import 
    Route::post('masterschedules/import', [MasterScheduleController::class, 'import'])->name('masterschedules.import');
    // Status update GET
    Route::get('update-status/{id}', [AdminController::class, 'updateStatus'])->name('update.status');
    // League single show
    Route::get('/leagues/{league}', [LeagueController::class, 'show'])->name('leagues.show');

});



/**
 * Test Routes
 */
