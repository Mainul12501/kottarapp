<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public $gigs;
    public function home ()
    {
        return view('front.home.home');
    }

    public function browseAllGigs ()
    {
        $this->gigs = JobPost::where('status', '1')->latest()->with('skills','jobPostQuestions', 'jobPostFiles')->get();
        if (auth()->user()->user_role_id == 0)
        {
            $this->gigs = JobPost::where('status', '1')->latest()->with('skills','jobPostQuestions', 'jobPostFiles')->get();
            if (Str::contains(url()->current(), '/api/'))
            {
                return json_encode($this->gigs);
            }else {
                return view('front.auth-front.freelancer.jobs.browse.jobs', [
                    'gigs'  => $this->gigs,
                ]);
            }
        }
        if (Str::contains(url()->current(), '/api/'))
        {
            return response()->json(['error' => 'You are not authorised to view this page.']);
        } else {
            return back()->with(['error' => 'You are not authorised to view this page.']);
        }
    }
}
