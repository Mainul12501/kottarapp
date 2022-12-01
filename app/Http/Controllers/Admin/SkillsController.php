<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillCategory;
use App\Models\Admin\SkillSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SkillsController extends Controller
{
    private $skills, $skill;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.job-post.skills.index', ['skills' => Skill::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.job-post.skills.create', [
            'skillCategories'   => SkillCategory::where('status', 1)->get(),
            'skillSubCategories'   => SkillSubCategory::where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Skill::createOrUpdateSkill($request);
        return back()->with('success', 'Skill created successfully.');
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
        return view('backend.job-post.skills.create', [
            'skill'         => Skill::find($id),
            'skillCategories'   => SkillCategory::where('status', 1)->get(),
            'skillSubCategories'   => SkillSubCategory::where('status', 1)->get(),
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
        Skill::createOrUpdateSkill($request, $id);
        return redirect()->route('skills.index')->with('success', 'Skill updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Skill::findOrFail($id)->delete();
        return back()->with('success', 'Skill deleted successfully.');
    }

    public function getAllSkills ()
    {

        if (Str::contains(url()->current(), '/api/'))
        {
            $this->skills = Skill::latest()->select('id', 'skill_name')->get();
            return response()->json($this->skills,200);
        } else {
            $this->skills = Skill::latest()->get();
            return $this->skills;
        }

    }
}
