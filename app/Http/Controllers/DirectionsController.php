<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directions;
use App\Models\Files;

class DirectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $directions = new Directions;
        $directions = $directions->paginate(4);
        return view('school.admin.direction.index', compact('directions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $directions = request()->get('logo');
        $files = Files::paginate(10);
        return view('school.admin.direction.create', compact('files'));
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
        $directions = new Directions;
        $validate_data = $request->validate(
            [
                'logo' => 'required',
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $directions->logo = $request->logo;
        $directions->title = $request->title;
        $directions->description = $request->description;

        $directions->save();
        return redirect('admin/direction')->with('message', 'Your data is submitted ');
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
        $directions = new Directions;
        $directions = $directions->where('id', $id)->First();
        return view('school.admin.direction.show', compact('directions'), compact('files'));
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
        $directions = new Directions;
        $directions = $directions->where('id', $id)->First();
        return view('school.admin.direction.edit', compact('directions'), compact('files'));
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
        $directions = new Directions;
        $directions = $directions->where('id', $id)->First();
        $directions->logo = $request->logo;
        $directions->title = $request->title;
        $directions->description = $request->description;
        $directions->update();
        return redirect('admin/direction');
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
        $directions = new Directions;
        $directions = $directions->where('id', $id)->first();;
        $directions->delete();
        return redirect('admin/direction')->with('message', 'Your data has been deleted');
    }
}