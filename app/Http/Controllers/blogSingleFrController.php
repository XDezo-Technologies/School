<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogs;
use App\Models\setting;

class blogSingleFrController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $courseID
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $blogs = blogs::all();
        $blog = $blogs->where('id', $id)->First();
        $settings = Setting::all();
        return view('school.blog-single', compact('blog', 'settings'));
    }
}