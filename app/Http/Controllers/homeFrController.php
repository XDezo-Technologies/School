<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Abouts;
use App\Models\Histories;
use App\Models\Facts;
use App\Models\Testimonials;
use App\Models\setting;
use App\Models\galleries;

class homeFrController extends Controller
{
    public function index()
    {
        $sliders = Sliders::all();
        $abouts = Abouts::limit(1)->get();
        $histories =  Histories::orderBy('date', 'asc')->get();
        $facts = Facts::all();
        $galleries = Galleries::all();
        $testimonials = Testimonials::all();
        $settings = Setting::all();

        return view('school.index', compact('sliders', 'abouts', 'histories', 'facts', 'testimonials', 'settings', 'galleries'));
    }
}
