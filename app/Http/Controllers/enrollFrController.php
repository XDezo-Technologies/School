<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use App\Models\Setting;

class enrollFrController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $courseID
     * @return \Illuminate\Http\Response
     */
    public function show($courseID)
    {
        $courses = new Courses;
        $courses = $courses->where('courseID', $courseID)->First();
        $settings = Setting::all();
        return view('school.enroll', compact('courses', 'settings'));
    }
}
