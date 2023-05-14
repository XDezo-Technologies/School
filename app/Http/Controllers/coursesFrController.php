<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use App\Models\setting;

class coursesFrController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        $courses = Courses::all();
        return view('school.courses', compact('courses', 'settings'));
    }
}
