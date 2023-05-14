<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardsOfDirector;
use App\Models\setting;

class BoardsFrCOntroller extends Controller
{
    public function index()
    {
        $settings = setting::all();
        $boards = BoardsOfDirector::all();
        return view('school.boards', compact('boards', 'settings'));
    }
}
