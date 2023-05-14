<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Files;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = new Sliders;
        $sliders = $sliders->paginate(4);
        return view('school.admin.Sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sliders = request()->get('img');
        $files = Files::paginate(10);
        return view('school.admin.Sliders.create', compact('files'));
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
        $sliders = new Sliders;
        $validate_data = $request->validate(
            [
                'title' => 'required',
                'title2' => 'required',
                'description' => 'required',
                'img' => 'required',
            ]
        );
        $sliders->title = $request->title;
        $sliders->title2 = $request->title2;
        $sliders->description = $request->description;
        $sliders->img = $request->img;

        $sliders->save();
        return redirect('admin/slider')->with('message', 'Your data is submitted ');
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
        $sliders = new Sliders;
        $sliders = $sliders->where('id', $id)->First();
        return view('school.admin.Sliders.show', compact('sliders'), compact('files'));
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
        $sliders = new Sliders;
        $sliders = $sliders->where('id', $id)->First();
        return view('school.admin.Sliders.edit', compact('sliders'), compact('files'));
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
        $sliders = new Sliders;
        $sliders = $sliders->where('id', $id)->First();
        $sliders->title = $request->title;
        $sliders->title2 = $request->title2;
        $sliders->description = $request->description;
        $sliders->img = $request->img;
        $sliders->update();
        return redirect('admin/slider');
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
        $sliders = new Sliders;
        $sliders = $sliders->where('id', $id)->first();;
        $sliders->delete();
        return redirect('admin/slider')->with('message', 'Your data has been deleted');
    }
}