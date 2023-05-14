<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\models\results;
use App\models\setting;

class resultFrController extends Controller
{
    public function index()
    {
        $results = Results::where('studentID', Auth::id())->get();
        $settings = Setting::all();
        return view('school.result', compact('results', 'settings'));
    }
}
