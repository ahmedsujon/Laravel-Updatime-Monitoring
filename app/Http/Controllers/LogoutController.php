<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function vendorLogout(Request $request)
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login');
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()->route('app.home');
    }
}
