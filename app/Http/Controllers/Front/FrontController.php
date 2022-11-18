<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\ApplyJob;
use App\Models\Admin\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public $gigs, $gig;
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

    public function freelancerGigDetails ($slug)
    {
        return view('front.auth-front.freelancer.jobs.browse.details', [
            'gig'   => JobPost::where('job_post_slug', $slug)->first(),
        ]);
    }

    public function applyGig (Request $request, $slug)
    {
        $this->gig = JobPost::where('job_post_slug', $slug)->first();
        $applyJob = ApplyJob::applyJob($request, $this->gig);
        if (Str::contains(url()->current(), '/api/'))
        {
            return response()->json(['success' => 'You successfully applied for this job.', 'apply_job' => $applyJob]);
        } else {
            return redirect()->route('freelancer.browse-all-gigs')->with('success' , 'You successfully applied for this job.');
        }
    }
}
