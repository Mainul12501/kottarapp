<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Http\Request;

class CustomAuthUserViewController extends Controller
{
    public function authUserDashboard ()
    {
        $customAuth = new CustomAuthController();
        return view('front.auth-front.client.dashboard.dashboard', [
            'profilePercent'    => $customAuth->profileCompletionPercent(),
        ]);
    }
}
