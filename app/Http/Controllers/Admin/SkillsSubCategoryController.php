<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SkillCategory;
use App\Models\Admin\SkillSubCategory;
use Illuminate\Http\Request;

class SkillsSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.job-post.skill-sub-category.index',[
            'skillSubCategories'    => SkillSubCategory::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.job-post.skill-sub-category.create', ['skillCategories' => SkillCategory::where('status', 1)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SkillSubCategory::createOrUpdateSkillSubCategory($request);
        return back()->with('success', 'skill sub category created successfully.');
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
        return view('backend.job-post.skill-sub-category.create', [
            'skillSubCategory' => SkillSubCategory::findOrFail($id),
            'skillCategories' => SkillCategory::where('status', 1)->get()
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
        SkillSubCategory::createOrUpdateSkillSubCategory($request, $id);
        return redirect()->route('skills-sub-category.index')->with('success', 'skill sub category created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SkillSubCategory::find($id)->delete();
        return back()->with('success', 'skill sub category deleted successfully.');
    }
}
