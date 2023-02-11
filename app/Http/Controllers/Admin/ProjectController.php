<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CreateProjectRequest;
use App\Models\Admin\JobPostQuestion;
use App\Models\Admin\Project;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public $project, $projects;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->projects = Project::where('client_id', auth()->id())->with('jobPosts', 'clientUser')->get();
        if (Str::contains(url()->current(), '/api/'))
        {
            if ($this->projects->isEmpty())
            {
                return response()->json(['error' => 'Something went wrong. Please try agian.'], 500);
            } else {
                return response()->json($this->projects);
            }
        } else {
            return view('front.auth-front.client.post-project.index', [
                'projects'  => $this->projects,
                'skillCategories'   => SkillCategory::where('status', 1)->get(),
                'skills'    => Skill::where('status', 1)->get(),
                'questions'    => JobPostQuestion::where('status', 1)->get(),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $this->project = Project::createOrUpdateProject($request);
        if (Str::contains(url()->current(), '/api/'))
        {
            if (isset($this->project))
            {
                return response()->json($this->project);
            } else {
                return response()->json(['error' => 'Someting went wrong. Please try again.'], 500);
            }
        } else {
            return redirect()->back()->with('success', 'Project Created successfully.');
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
        $this->project = Project::find($id);
        return response()->json($this->project);
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
        $this->project = Project::createOrUpdateProject($request, $id);
        if (Str::contains(url()->current(), '/api/'))
        {
            if (isset($this->project))
            {
                return response()->json($this->project, 200);
            } else {
                return response()->json(['error' => 'Someting went wrong. Please try again.'], 500);
            }
        } else {
            return redirect()->back()->with('success', 'Project updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->project = Project::find($id);
        $this->project->delete();
        if (Str::contains(url()->current(), '/api/'))
        {
            return response()->json(['success' => 'Project deleted successfully.']);
        } else {
            return redirect()->back()->with('success' , 'Project deleted successfully.');
        }
    }
}
