<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showAdminLogin()
    {
        return view('auth.login');
    }

    // Login method
    public function login(Request $request)
    {
        // Validation
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        // Login Attempt
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]) || Auth::guard('admin')->attempt(['username' => $request->email, 'password' => $request->password])) {
            //If status is false, user can't login
            if (Auth::guard('admin')->user()->status) {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::guard('admin')->logout();

                return redirect()->route('admin.login')->with('danger', 'Your account is not activated by the authority');
            }
        } else {
            return redirect()->route('admin.login')->with('danger', 'Email or password not correct');
        }
    }

    // Logout method
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
