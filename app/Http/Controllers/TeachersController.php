<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teachers;
use App\Models\Files;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = new Teachers;
        $teachers = $teachers->paginate(4);
        return view('school.admin.Teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = Files::paginate(10);
        return view('school.admin.Teachers.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teachers = new Teachers;
        $validate_data = $request->validate(
            [
                'img' => 'required',
                'name' => 'required',
                'post' => 'required',
                'field' => 'required',
                'experience' => 'required',
                'description' => 'required',
            ]
        );
        $teachers->img = $request->img;
        $teachers->name = $request->name;
        $teachers->field = $request->field;
        $teachers->experience = $request->experience;
        $teachers->post = $request->post;
        $teachers->description = $request->description;

        $teachers->save();
        return redirect('admin/teacher')->with('message', 'Your data is submitted ');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $teacherID
     * @return \Illuminate\Http\Response
     */
    public function show($teacherID)
    {
        $files = Files::paginate(10);
        $teachers = new Teachers;
        $teachers = $teachers->where('teacherID', $teacherID)->First();
        return view('school.admin.Teachers.show', compact('teachers'), compact('files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $teacherID
     * @return \Illuminate\Http\Response
     */
    public function edit($teacherID)
    {
        $files = Files::paginate(10);
        $teachers = new Teachers;
        $teachers = $teachers->where('teacherID', $teacherID)->First();
        return view('school.admin.Teachers.edit', compact('teachers', 'files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $teacherID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teacherID)
    {
        $teachers = new Teachers;
        $teachers = $teachers->where('teacherID', $teacherID)->First();
        $teachers->img = $request->img;
        $teachers->name = $request->name;
        $teachers->field = $request->field;
        $teachers->experience = $request->experience;
        $teachers->post = $request->post;
        $teachers->description = $request->description;
        $teachers->update();
        return redirect('admin/teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($teacherID)
    {
        $teachers = new Teachers;
        $teachers = $teachers->where('teacherID', $teacherID)->first();;
        $teachers->delete();
        return redirect('admin/teacher')->with('message', 'Your data has been deleted');
    }
}