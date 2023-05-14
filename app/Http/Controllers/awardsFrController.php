<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Awards;
use App\Models\setting;

class awardsFrController extends Controller
{
    public function index()
    {
        $awards = awards::all();
        $settings = Setting::all();
        return view('school.award-list', compact('awards', 'settings'));
    }
}
