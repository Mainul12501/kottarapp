<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomAuthUserViewController extends Controller
{
    public function authUserDashboard ()
    {
        return view('front.auth-front.client.dashboard.dashboard');
    }
}
