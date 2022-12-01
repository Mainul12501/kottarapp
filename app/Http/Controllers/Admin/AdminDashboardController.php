<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard ()
    {
        if (auth()->user()->user_role_type == 1 || auth()->user()->user_role_type == 2)
        {
            return redirect()->route('client.dashboard')->with('error', 'You do not have Admin permission.');
        }
        return view('backend.home.dashboard');
    }
}
