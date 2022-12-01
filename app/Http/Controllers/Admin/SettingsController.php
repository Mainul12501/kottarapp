<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteSetting;
use App\Models\Backend\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.settings.index',[
            'setting'   => SiteSetting::first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('settings.index',[
            'setting'   => SiteSetting::first(),
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
        return $request;
        $this->validateGeneralRules($request);
        try {
            DB::transaction(function () use ($request){
                SiteSetting::storeOrUpdate($request);
            });
            return back()->with('success', 'Settings updated successfully');
        } catch (\Exception $exception)
        {
            return back()->withErrors('error', $exception->getMessage());
//            return back()->with('error', 'Something went wrong. Please try again.');
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
        return redirect()->route('settings.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('settings.index');
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
        $this->validateGeneralRules($request);
        try {
            DB::transaction(function () use ($request, $id){
                SiteSetting::storeOrUpdate($request, $id);
            });
            return back()->with('success', 'Settings updated successfully');
        } catch (\Exception $exception)
        {
//            return back()->withErrors('error', $exception->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function validateGeneralRules ($request)
    {
        return $this->validate($request, [
            'site_title'            => 'required|string',
            'site_name'             => 'required',
            'site_logo'             => 'image',
            'site_banner'           => 'image',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('settings.index');
    }
}
