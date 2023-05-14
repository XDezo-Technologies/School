<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use App\Models\histories;

class HistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = new Histories;
        $histories = $histories->paginate(4);
        return view('school.admin.Histories.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = Files::paginate(10);
        return view('school.admin.Histories.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $histories = new Histories;
        $validate_data = $request->validate(
            [
                'img' => 'required',
                'date' => 'required',
                'description' => 'required',
            ]
        );
        $histories->img = $request->img;
        $histories->date = $request->date;
        $histories->description = $request->description;

        $histories->save();
        return redirect('admin/history')->with('message', 'Your data is submitted ');
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
        $histories = new Histories;
        $histories = $histories->where('id', $id)->First();
        return view('school.admin.Histories.show', compact('histories', 'files'));
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
        $histories = new Histories;
        $histories = $histories->where('id', $id)->First();
        return view('school.admin.Histories.edit', compact('histories', 'files'));
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
        $histories = new Histories;
        $histories = $histories->where('id', $id)->First();
        $histories->img = $request->img;
        $histories->date = $request->date;
        $histories->description = $request->description;
        $histories->update();
        return redirect('admin/history');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $histories = new Histories;
        $histories = $histories->where('id', $id)->First();
        $histories->delete();
        return redirect('admin/history')->with('message', 'Your data has been deleted');
    }
}