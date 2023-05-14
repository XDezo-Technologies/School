<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardsOfDirector;
use App\Models\Files;

class BoardsOfDirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $boardsOfDirector = new BoardsOfDirector;
        $boardsOfDirector = $boardsOfDirector->paginate(4);
        return view('school.admin.boardsOfDirector.index', compact('boardsOfDirector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $boardsOfDirector = request()->get('img');
        $files = Files::paginate(10);
        return view('school.admin.boardsOfDirector.create', compact('files'));
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
        $boardsOfDirector = new BoardsOfDirector;
        $validate_data = $request->validate(
            [
                'img' => 'required',
                'name' => 'required',
                'post' => 'required',
                'description' => 'required',
            ]
        );
        $boardsOfDirector->img = $request->img;
        $boardsOfDirector->post = $request->post;
        $boardsOfDirector->name = $request->name;
        $boardsOfDirector->description = $request->description;
        $boardsOfDirector->save();
        return redirect('admin/boardsOfDirector')->with('message', 'Your data is submitted ');
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
        $boardsOfDirector = new BoardsOfDirector;
        $boardsOfDirector = $boardsOfDirector->where('id', $id)->First();
        return view('school.admin.boardsOfDirector.show', compact('boardsOfDirector'), compact('files'));
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
        $boardsOfDirector = new BoardsOfDirector;
        $boardsOfDirector = $boardsOfDirector->where('id', $id)->First();
        return view('school.admin.boardsOfDirector.edit', compact('boardsOfDirector'), compact('files'));
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
        $boardsOfDirector = new BoardsOfDirector;
        $boardsOfDirector = $boardsOfDirector->where('id', $id)->First();
        $boardsOfDirector->img = $request->img;
        $boardsOfDirector->post = $request->post;
        $boardsOfDirector->name = $request->name;
        $boardsOfDirector->description = $request->description;
        $boardsOfDirector->update();
        return redirect('admin/boardsOfDirector');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $boardsOfDirector = new BoardsOfDirector;
        $boardsOfDirector = $boardsOfDirector->where('id', $id)->first();;
        $boardsOfDirector->delete();
        return redirect('admin/boardsOfDirector')->with('message', 'Your data has been deleted');
    }
}