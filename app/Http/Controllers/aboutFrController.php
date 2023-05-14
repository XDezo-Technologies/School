<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abouts;
use App\Models\AboutsDetails;
use App\Models\Directions;
use App\Models\Galleries;
use App\Models\Testimonials;
use App\Models\setting;

class aboutFrController extends Controller
{
    public function index()
    {
        $abouts = Abouts::limit(1)->get();
        $aboutsDetails = AboutsDetails::limit(1)->get();
        $directions = Directions::all();
        $galleries = Galleries::all();
        $testimonials = Testimonials::all();
        $settings = Setting::all();

        return view('school.about', compact('abouts', 'aboutsDetails', 'directions', 'galleries', 'testimonials', 'settings'));
    }
}
