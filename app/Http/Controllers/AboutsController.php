<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abouts;
use App\Models\Files;

class AboutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $abouts = new Abouts;
        $abouts = $abouts->paginate(4);
        return view('school.admin.Abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $files = Files::paginate(10);
        return view('school.admin.Abouts.create', compact('files'));
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
        $abouts = new Abouts;
        $validate_data = $request->validate(
            [
                'img' => 'required',
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $abouts->img = $request->img;
        $abouts->title = $request->title;
        $abouts->description = $request->description;

        $abouts->save();
        return redirect('admin/about')->with('message', 'Your data is submitted ');
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
        $abouts = new Abouts;
        $abouts = $abouts->where('id', $id)->First();
        return view('school.admin.Abouts.show', compact('abouts', 'files'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $files = Files::paginate(10);
        $abouts = new Abouts;
        $abouts = $abouts->where('id', $id)->First();
        return view('school.admin.Abouts.edit', compact('abouts', 'files'));
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

        $abouts = new Abouts;
        $abouts = $abouts->where('id', $id)->First();
        $abouts->img = $request->img;
        $abouts->title = $request->title;
        $abouts->description = $request->description;
        $abouts->update();
        return redirect('admin/about');
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
        $abouts = new Abouts;
        $abouts = $abouts->where('id', $id)->first();;
        $abouts->delete();
        return redirect('admin/about')->with('message', 'Your data has been deleted');
    }
}