<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galleries;
use App\Models\Files;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = new Galleries;
        $galleries = $galleries->paginate(4);
        return view('school.admin.Galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = Files::paginate(10);
        return view('school.admin.Galleries.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galleries = new Galleries;
        $validate_data = $request->validate(
            [
                'img' => 'required',
                'title' => 'required',
            ]
        );
        $galleries->img = $request->img;
        $galleries->title = $request->title;
        $galleries->save();
        return redirect('admin/gallery')->with('message', 'Your data is submitted ');
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
        $galleries = new Galleries;
        $galleries = $galleries->where('id', $id)->First();
        return view('school.admin.Galleries.show', compact('galleries', 'files'));
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
        $galleries = new Galleries;
        $galleries = $galleries->where('id', $id)->First();
        return view('school.admin.Galleries.edit', compact('galleries', 'files'));
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
        $galleries = new Galleries;
        $galleries = $galleries->where('id', $id)->First();
        $galleries->img = $request->img;
        $galleries->title = $request->title;
        $galleries->update();
        return redirect('admin/gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galleries = new Galleries;
        $galleries = $galleries->where('id', $id)->first();;
        $galleries->delete();
        return redirect('admin/gallery')->with('message', 'Your data has been deleted');
    }
}
