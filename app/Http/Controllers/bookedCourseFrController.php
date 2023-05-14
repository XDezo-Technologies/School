<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admissions;
use Illuminate\support\Facades\Auth;
use App\Models\setting;

class bookedCourseFrController extends Controller
{
    public function index()
    {
        $admissions = Admissions::where('studentID', Auth::id())->get();
        $settings = Setting::all();
        return view('school.courses_booked', compact('admissions', 'settings'));
    }
}
