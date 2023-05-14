<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facts;
use App\Models\Files;

class FactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facts = new Facts;
        $facts = $facts->paginate(4);
        return view('admin.facts.index', compact('facts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $facts = request()->get('img');
        $files = Files::paginate(10);
        return view('admin.facts.create', compact('files'));
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
        $facts = new Facts;
        $validate_data = $request->validate(
            [
                'logo' => 'required',
                'number' => 'required',
                'title' => 'required',
            ]
        );
        $facts->logo = $request->logo;
        $facts->number = $request->number;
        $facts->title = $request->title;

        $facts->save();
        return redirect('admin/fact')->with('message', 'Your data is submitted ');
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
        $facts = new Facts;
        $facts = $facts->where('id', $id)->First();
        return view('admin.facts.show', compact('facts'), compact('files'));
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
        $facts = new Facts;
        $facts = $facts->where('id', $id)->First();
        return view('admin.facts.edit', compact('facts'), compact('files'));
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
        $facts = new Facts;
        $facts = $facts->where('id', $id)->First();
        $facts->logo = $request->logo;
        $facts->number = $request->number;
        $facts->title = $request->title;
        $facts->update();
        return redirect('admin/fact');
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
        $facts = new Facts;
        $facts = $facts->where('id', $id)->first();;
        $facts->delete();
        return redirect('admin/fact')->with('message', 'Your data has been deleted');
    }
}
