<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            return redirect()->back()->with('error', 'Your account has not approved yet.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            if (!empty($request->file('files')))
            {
                JobPostFile::saveJobPostFile($request->file('files'), $this->jobPost);
            }

        } catch (\Exception $exception)
        {
            DB::rollBack();
        }
        if (isset($this->jobPost))
        {
            return redirect()->route('client.job-post-list')->with('success', 'Job created successfully and pending for approve. One of our admin will review and approve your job very soon.');
        } else {
            return back()->with('error', 'Something went wrong. Please try again.');
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
        //
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
        return view('front.auth-front.client.post-job.index',[
            'jobPosts'  => JobPost::where('client_user_id', auth()->id())->get(),
        ]);
    }
}
