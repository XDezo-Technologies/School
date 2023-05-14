<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admissions;
use Illuminate\Support\Facades\File;

class AdmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admissions = new admissions;
        $admissions = $admissions->paginate(4);
        return view('school.admin.Admission.index', compact('admissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $admissions = new admissions;
        // return view('school.admin.Admission.create', compact('admissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admissions = new admissions;
        $validate_data = $request->validate(
            [
                'studentID' => 'required',
                'courseID' => 'required',
                'name' => 'required',
                'courseName' => 'required',
                'img' => 'required',
            ]
        );
        $fileName = $request->id . '-' . time() . '.' . $request->img->extension();
        $request->img->move(public_path('formimg'), $fileName);
        $admissions->img = $fileName;
        $admissions->studentID = $request->studentID;
        $admissions->courseID = $request->courseID;
        $admissions->name = $request->name;
        $admissions->courseName = $request->courseName;
        $admissions->save();
        return redirect('booked');
    }

    /**
     * Display the specified resource.
     * @param   App\Models\admissions  $admissions
     * @param  int  $admissionID
     * @return \Illuminate\Http\Response
     */
    public function show($admissionID)
    {
        $admissions = new admissions;
        $admissions = $admissions->where('admissionID', $admissionID)->First();
        return view('school.admin.Admission.show', compact('admissions'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param   App\Models\admissions  $admissions
     * @param  int  $admissionID
     * @return \Illuminate\Http\Response
     */
    public function edit($admissionID)
    {
        $admissions = new admissions;
        $admissions = $admissions->where('admissionID', $admissionID)->First();
        return view('school.admin.Admission.edit', compact('admissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $admissionID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admissionID)
    {
        $admissions = Admissions::where('admissionID', $admissionID)->first();
        if ($request->img != NULL) {
            $fileName = $request->course_code . "-" . time() . '.' . $request->img->extension();
            File::delete(public_path('uploads/' . $admissions->img));
            $request->img->move(public_path('uploads'), $fileName);
            $admissions::where('admissionID', $admissionID)
                ->update([
                    'img' => $fileName,
                ]);
        }
        $admissions->studentID = $request->studentID;
        $admissions->courseID = $request->courseID;
        $admissions->name = $request->name;
        $admissions->courseName = $request->courseName;
        $admissions->updated_at = now();
        $admissions->save();
        return redirect('admin/admission');
    }
    /**
     * Remove the specified resource from storage.
     * @param   App\Models\admissions  $admissions
     * @param  int  $admissionID
     * @return \Illuminate\Http\Response
     */
    public function destroy($admissionID)
    {
        $admissions = new admissions;
        $admissions = $admissions->where('admissionID', $admissionID);
        File::delete(public_path('uploads/' . $admissions->img));
        $admissions->delete();
        return redirect('admin/admission')->with('message', 'Your data has been deleted');
    }
}
