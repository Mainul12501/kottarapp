<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\JobPostFormRequest;
use App\Models\Admin\JobPost;
use App\Models\Admin\JobPostFile;
use App\Models\Admin\JobPostQuestion;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillCategory;
use App\Models\Admin\SkillSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobPostController extends Controller
{
    private $subCategories, $jobPosts, $jobPost;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->jobPosts = JobPost::where('client_user_id', auth()->id())->latest()->get();
        if (Str::contains(url()->current(), '/api/'))
        {
            if ($this->jobPosts->isEmpty())
            {
                return response()->json(['error' => 'No gigs found.']);
            }else {
                return response()->json($this->jobPosts);
            }
        } else {
            return view('backend.job-post.job-manage.index', [
                'jobs'  => $this->jobPosts,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->account_status == 1)
        {
            if (Str::contains(url()->current(), '/api/'))
            {

                return response()->json([
                    'skillCategories' => SkillCategory::where('status', 1)->latest()->get(),
                    'skills'        => Skill::where('status', 1)->get(),
                    'questions'     => JobPostQuestion::where('status', 1)->get(),
                ]);
            } else {
                return view('front.auth-front.client.post-job.create', [
                    'skillCategories'   => SkillCategory::where('status', 1)->latest()->get(),
                    'skills'            => Skill::where('status', 1)->get(),
                    'questions'         => JobPostQuestion::where('status', 1)->get(),
                ]);
            }
        } else {
            if (Str::contains(url()->current(), '/api/'))
            {
                return response()->json(['error' => 'Your account has not approved yet.']);
            }
            return redirect()->back()->with('error', 'Your account has not approved yet.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobPostFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->jobPost = JobPost::createJob($request);
            if (!empty($request->required_skills))
            {
                $this->jobPost->skills()->sync($request->required_skills);
            }
            if (!empty($request->job_questions))
            {
                $this->jobPost->jobPostQuestions()->sync($request->job_questions);
            }
            if ($request->hasFile('files'))
            {
                JobPostFile::saveJobPostFile($request->file('files'), $this->jobPost);
            }

        } catch (\Exception $exception)
        {
            DB::rollBack();
        }
        if(Str::contains(url()->current(), '/api/'))
        {
            if ($this->jobPost)
            {
                return response()->json([
                    'gig'   => $this->jobPost,
                    'skills'    => $this->jobPost->skills,
                    'questions' => $this->jobPost->jobPostQuestions,
                    'files'     => $this->jobPost->jobPostFiles,
                ]);

            } else {
                return response()->json(['error' =>'Something went wrong. Please try again.']);
            }
        } else {
            if (isset($this->jobPost))
            {
                return redirect()->route('client.job-post-list')->with('success', 'Job created successfully and pending for approve. One of our admin will review and approve your job very soon.');
            } else {
                return back()->with('error', 'Something went wrong. Please try again.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Str::contains(url()->current(), '/api/'))
        {
            return response()->json([
                'skillCategories'   => SkillCategory::where('status', 1)->latest()->get(),
                'skills'            => Skill::where('status', 1)->get(),
                'questions'         => JobPostQuestion::where('status', 1)->get(),
                'jobPost'           => JobPost::findOrFail($id),
            ]);
        }
        return view('front.auth-front.client.post-job.create', [
            'skillCategories'   => SkillCategory::where('status', 1)->latest()->get(),
            'skills'            => Skill::where('status', 1)->get(),
            'questions'         => JobPostQuestion::where('status', 1)->get(),
            'jobPost'           => JobPost::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobPost::findOrFail($id)->delete();
        if (Str::contains(url()->current(),'/api/'))
        {
            return response()->json(['success' => 'Gig deleted successfully.']);
        } else {
            return back()->with('success', 'Gig deleted successfully.');
        }
    }

    public function getSubCategoriesByCategory ($categoryId)
    {
        $this->subCategories = SkillSubCategory::where('skill_category_id', $categoryId)->where('status', 1)->get();
        return response()->json($this->subCategories);
    }

    public function userWiseJobPost ()
    {
        $this->jobPosts = JobPost::where('client_user_d', auth()->id())->get();
        if (Str::contains(url()->current(), '/api/'))
        {
            if ($this->jobPosts->isEmpty())
            {
                return response()->json(['error' => 'No gigs found.']);
            } else {
                return response()->json($this->jobPosts);
            }
        }
        return view('front.auth-front.client.post-job.index',[
            'jobPosts'  => $this->jobPosts,
        ]);
    }

    public function approveJob ($id)
    {
        $this->jobPost = JobPost::find($id);
        if ($this->jobPost->status == 0)
        {
            $this->jobPost->status = 1;
        }

    }
}
