<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Awards;
use App\Models\Files;

class AwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $awards = new Awards;
        $awards = $awards->paginate(4);
        return view('school.admin.Awards.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = Files::paginate(10);
        return view('school.admin.Awards.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $awards = new Awards;
        $validate_data = $request->validate(
            [
                'img' => 'required',
                'name' => 'required',
                'trophyName' => 'required',
                'description' => 'required',
            ]
        );
        $awards->img = $request->img;
        $awards->name = $request->name;
        $awards->trophyName = $request->trophyName;
        $awards->description = $request->description;

        $awards->save();
        return redirect('admin/award')->with('message', 'Your data is submitted ');
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
        $files = Files::paginate(10);
        $awards = new Awards;
        $awards = $awards->where('id', $id)->First();
        return view('school.admin.Awards.show', compact('awards'), compact('files'));
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
        $awards = new Awards;
        $awards = $awards->where('id', $id)->First();
        return view('school.admin.Awards.edit', compact('awards', 'files'));
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
        $awards = new Awards;
        $awards = $awards->where('id', $id)->First();
        $awards->img = $request->img;
        $awards->name = $request->name;
        $awards->trophyName = $request->trophyName;
        $awards->description = $request->description;

        $awards->update();
        return redirect('admin/award');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $awards = new Awards;
        $awards = $awards->where('id', $id)->first();;
        $awards->delete();
        return redirect('admin/award')->with('message', 'Your data has been deleted');
    }
}