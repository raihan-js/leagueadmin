<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    function showAdminDashboard(){
        return view('pages.dashboard');
    }
}
