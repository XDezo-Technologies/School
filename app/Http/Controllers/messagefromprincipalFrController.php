<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\messageFromPrincipal;
use App\Models\setting;

class messagefromprincipalFrController extends Controller
{
    public function index()
    {
        $messageFromPrincipal = MessageFromPrincipal::limit(1)->get();
        $settings = Setting::all();
        return view('school.principalMessage', compact('messageFromPrincipal', 'settings'));
    }
}
