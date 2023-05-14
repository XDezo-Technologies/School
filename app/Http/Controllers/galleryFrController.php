<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galleries;
use App\Models\setting;

class galleryFrController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        $galleries = Galleries::paginate(20);
        return view('school.gallery', compact('galleries', 'settings'));
    }
}