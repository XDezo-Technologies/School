<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\setting;

class eventFrController extends Controller
{
    public function index()
    {
        $events = Events::all();
        $settings = Setting::all();
        return view('school.events', compact('events', 'settings'));
    }
}
