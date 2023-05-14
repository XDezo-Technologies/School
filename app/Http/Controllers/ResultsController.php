<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Results;
use App\Models\Files;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = new Results;
        $results = $results->paginate(4);
        return view('school.admin.Result.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.admin.Result.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $results = new Results;
        $validate_data = $request->validate(
            [
                'studentID' => 'required',
                'name' => 'required',
                'subject' => 'required',
                'full_marks' => 'required',
                'pass_marks' => 'required',
                'acquired_marks' => 'required',
                'remarks' => 'required',
            ]
        );
        $results->studentID = $request->studentID;
        $results->name = $request->name;
        $results->subject = $request->subject;
        $results->full_marks = $request->full_marks;
        $results->pass_marks = $request->pass_marks;
        $results->acquired_marks = $request->acquired_marks;
        $results->remarks = $request->remarks;

        $results->save();
        return redirect('admin/result')->with('message', 'Your data is submitted ');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $resultID
     * @return \Illuminate\Http\Response
     */
    public function show($resultID)
    {
        $files = Files::all();
        $results = new Results;
        $results = $results->where('resultID', $resultID)->First();
        return view('school.admin.Result.show', compact('results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $resultID
     * @return \Illuminate\Http\Response
     */
    public function edit($resultID)
    {
        $files = Files::all();
        $results = new Results;
        $results = $results->where('resultID', $resultID)->First();
        return view('school.admin.Result.edit', compact('results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $resultID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $resultID)
    {
        $results = new Results;
        $results = $results->where('resultID', $resultID)->First();
        $results->studentID = $request->studentID;
        $results->name = $request->name;
        $results->subject = $request->subject;
        $results->full_marks = $request->full_marks;
        $results->pass_marks = $request->pass_marks;
        $results->acquired_marks = $request->acquired_marks;
        $results->remarks = $request->remarks;
        $results->update();
        return redirect('admin/result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $resultID
     * @return \Illuminate\Http\Response
     */
    public function destroy($resultID)
    {
        $results = new Results;
        $results = $results->where('resultID', $resultID)->first();;
        $results->delete();
        return redirect('admin/result')->with('message', 'Your data has been deleted');
    }
}
