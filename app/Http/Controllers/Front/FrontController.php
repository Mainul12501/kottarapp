<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\ApplyJob;
use App\Models\Admin\JobPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public $gigs, $gig, $user;
    public function home ()
    {
        return view('front.home.home');
    }

    public function viewProfile ($id)
    {
        $this->user = User::where('id', $id)->with('userDetails')->first();
        if (Str::contains(url()->current(), '/api/'))
        {
            if (isset($this->user))
            {
                return response()->json($this->user);
            } else {
                return response()->json(['error' => 'Something went wrong. Please try again'], 500);
            }
        }
        return view('front.user.profile.view-profile', [
            'user'  => $this->user
        ]);
    }
}
