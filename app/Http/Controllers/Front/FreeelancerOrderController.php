<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\JobPost;
use Illuminate\Http\Request;

class FreeelancerOrderController extends Controller
{
    protected $gig;
    public function submitOrder ($slug)
    {
        $this->gig = JobPost::where('job_post_slug', $slug)->first();
        return view('front.auth-front.freelancer.jobs.submit.order', ['gig' => $this->gig]);
    }
}
