<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;

class contactFrController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        // $teams = Teams::all();
        // $skills = Skills::all();
        // $clients = Clients::all();
        return view('school.contact', compact('settings'));
    }
}
