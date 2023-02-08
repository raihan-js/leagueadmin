<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    function showAdminDashboard(){
        return view('pages.dashboard');
    }

    function showAdminAccount(){
        return view('account.settings');
    }

    function showAdminNotifications(){
        return view('account.notifications');
    }

    function showAdminConnections(){
        return view('account.connections');
    }
    
}
