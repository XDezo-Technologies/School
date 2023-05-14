<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogs;
use App\Models\setting;

class blogFrController extends Controller
{
    public function index()
    {
        $blogs = blogs::all();
        $settings = Setting::all();
        return view('school.blog', compact('blogs', 'settings'));
    }
}
