<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notices;
use App\Models\Files;

class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notices = new Notices;
        $notices = $notices->paginate(4);
        return view('school.admin.notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $notices = request()->get('img');
        $files = Files::paginate(10);
        return view('school.admin.notices.create', compact('files'));
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
        //
        $notices = new Notices;
        $validate_data = $request->validate(
            [
                'teacherID' => 'required',
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $notices->teacherID = $request->teacherID;
        $notices->title = $request->title;
        $notices->description = $request->description;

        $notices->save();
        return redirect('admin/notice')->with('message', 'Your data is submitted ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $files = Files::paginate(10);
        //
        $notices = new Notices;
        $notices = $notices->where('id', $id)->First();
        return view('school.admin.notices.show', compact('notices'), compact('files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $files = Files::paginate(10);
        //
        $notices = new Notices;
        $notices = $notices->where('id', $id)->First();
        return view('school.admin.notices.edit', compact('notices'), compact('files'));
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
        //
        $notices = new Notices;
        $notices = $notices->where('id', $id)->First();
        $notices->teacherID = $request->teacherID;
        $notices->title = $request->title;
        $notices->description = $request->description;
        $notices->update();
        return redirect('admin/notice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $notices = new Notices;
        $notices = $notices->where('id', $id)->first();;
        $notices->delete();
        return redirect('admin/notice')->with('message', 'Your data has been deleted');
    }
}