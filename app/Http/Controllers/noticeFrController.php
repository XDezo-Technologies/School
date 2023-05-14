<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notices;
use App\Models\setting;

class noticeFrController extends Controller
{
    public function index()
    {
        $notices = Notices::all();
        $settings = Setting::all();
        return view('school.notice', compact('notices', 'settings'));
    }
}
