<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teachers;
use App\Models\testimonials;
use App\Models\setting;

class teacherFrController extends Controller
{
    public function index()
    {
        $teachers = teachers::all();
        $testimonials = testimonials::all();
        $settings = Setting::all();
        return view('school.teachers', compact('teachers', 'settings', 'testimonials'));
    }
}
