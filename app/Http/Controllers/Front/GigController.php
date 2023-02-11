<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\ApplyJob;
use App\Models\Admin\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GigController extends Controller
{
    public $gig, $gigs, $appliedGigs, $appliedGig;

    public function browseAllGigs ()
    {
        if (auth()->user()->user_role_type == 1)
        {
            $this->gigs = JobPost::where('status', '1')->latest()->with('skills','jobPostQuestions', 'jobPostFiles')->paginate(10);
            if (Str::contains(url()->current(), '/api/'))
            {
                return response()->json($this->gigs);
            }else {
                return view('front.auth-front.freelancer.jobs.browse.jobs', [
                    'gigs'  => $this->gigs,
                ]);
            }
        }
        if (Str::contains(url()->current(), '/api/'))
        {
            return response()->json(['error' => 'You are not authorised to view this page.'],500);
        } else {
            return back()->with(['error' => 'You are not authorised to view this page.']);
        }
    }

    public function freelancerGigDetails ($slug)
    {
        $this->gig = JobPost::where('job_post_slug', $slug)->with('user', 'skillCategory', 'skillSubCategory', 'jobPostFiles', 'jobPostQuestions', 'skills')->first();
        if (Str::contains(url()->current(), '/api/'))
        {
            if (isset($this->gig))
            {
                return response()->json($this->gig);
            } else {
                return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
            }
        } else {

            return view('front.auth-front.freelancer.jobs.browse.details', [
                'gig'   => $this->gig,
            ]);
        }
    }

    public function applyGig (Request $request, $slug)
    {
        if (auth()->user()->account_status == 1)
        {
            $this->gig = JobPost::where('job_post_slug', $slug)->first();
            $existProposal = ApplyJob::where(['job_post_id'=> $this->gig->id, 'freelancer_user_id' => auth()->id()])->first();
            if ($existProposal)
            {
                if (Str::contains(url()->current(), '/api/'))
                {
                    return response()->json('You already applied for this job.', 200);
                } else {
                    return back()->with('error', 'You already applied for this job.');
                }
            }
            $applyJob = ApplyJob::applyJob($request, $this->gig->id);
            if (Str::contains(url()->current(), '/api/'))
            {
                return response()->json(['success' => 'You successfully applied for this job.', 'apply_job' => $applyJob]);
            } else {
                return redirect()->route('freelancer.browse-all-gigs')->with('success' , 'You successfully applied for this job.');
            }
        } else {
            if (Str::contains(url()->current(), '/api/'))
            {
                return response()->json('Your account is not approved yet.', 500);
            } else {
                return back()->with('error', 'Your account is not approved yet.');
            }
        }


    }

    public function studentActiveGigs ()
    {
        $this->appliedGigs = ApplyJob::where('freelancer_user_id', auth()->id())->whereHas('jobPost', function ($jobPost) {
            $jobPost->where('status', 1);
        })->with('jobPost')->get();
        if (Str::contains(url()->current(), '/api/'))
        {
            if ($this->appliedGigs->isEmpty())
            {
                return response()->json(['error' => 'No gigs found.'], 500);
            } else {
                return response()->json($this->appliedGigs);
            }
        } else {
            return view('front.auth-front.freelancer.jobs.browse.applied-jobs', [
                'gigs'  => $this->appliedGigs,
            ]);
        }
    }

    public function declineGigOffer ($id)
    {
        $this->appliedGig = ApplyJob::find($id);
        $this->appliedGig->status = 0;
        $this->appliedGig->save();
        if (Str::contains(url()->current(), '/api/'))
        {
            if (isset($this->appliedGig))
            {
                return response()->json(['success' => 'Offer rejected successfully.']);
            } else {
                return response()->json(['error' => 'Something went wrong.Please try again'], 500);
            }
        } else {
            return redirect()->back()->with('success' , 'Offer rejected successfully.');
        }
    }

    public function hireStudent (Request $request)
    {
        if (auth()->user()->user_role_type == 2)
        {
            $this->appliedGig = ApplyJob::find($request->apply_job_id);
            $this->appliedGig->status = 2;
            $this->appliedGig->save();
        }

        if (Str::contains(url()->current(), '/api/'))
        {
            if (isset($this->appliedGig))
            {
                return response()->json([
                    'applyGig' => $this->appliedGig,
                    'success' => 'You hired this student for this gig successfully.',
                ]);
            } else {
                return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
            }
        } else {
            if (isset($this->appliedGig))
            {
                return redirect()->back()->with('success', 'You hired this student for this gig successfully.');
            } else {
                return redirect()->back()->with('error' , 'Something went wrong. Please try again.');
            }
        }
    }
}
