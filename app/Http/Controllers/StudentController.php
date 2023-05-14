<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = new Students;
        $students = $students->paginate(4);
        return view('school.admin.Students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = new Students;
        $validate_data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required',
            ]
        );
        $students->phone = $request->phone;
        $students->name = $request->name;
        $students->email = $request->email;
        $students->password = $request->password;

        $students->save();
        return redirect('admin/student')->with('message', 'Your data is submitted ');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = new Students;
        $students = $students->where('id', $id)->First();
        return view('school.admin.Students.show', compact('students'), compact('files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = new Students;
        $students = $students->where('id', $id)->First();
        return view('school.admin.Students.edit', compact('students', 'files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $students = new Students;
        $students = $students->where('id', $id)->First();
        $students->phone = $request->phone;
        $students->name = $request->name;
        $students->email = $request->email;
        $students->password = $request->password;
        $students->update();
        return redirect('admin/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = new Students;
        $students = $students->where('id', $id)->first();;
        $students->delete();
        return redirect('admin/student')->with('message', 'Your data has been deleted');
    }
}
