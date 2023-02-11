<?php

namespace App\Http\Controllers\Admin;

use App\Events\JobPostNotificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomAuthController;
use App\Notifications\GigPostedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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
