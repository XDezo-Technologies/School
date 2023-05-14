<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Files;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = new Events;
        $events = $events->paginate(4);
        return view('school.admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $events = request()->get('img');
        $files = Files::paginate(10);
        return view('school.admin.events.create', compact('files'));
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
        $events = new Events;
        $validate_data = $request->validate(
            [
                'img' => 'required',
                'title' => 'required',
                'description' => 'required',
                'from' => 'required',
                'to' => 'required',
            ]
        );
        $events->img = $request->img;
        $events->title = $request->title;
        $events->from = $request->from;
        $events->description = $request->description;
        $events->to = $request->to;

        $events->save();
        return redirect('admin/event')->with('message', 'Your data is submitted ');
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
        $events = new Events;
        $events = $events->where('id', $id)->First();
        return view('school.admin.events.show', compact('events'), compact('files'));
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
        $events = new Events;
        $events = $events->where('id', $id)->First();
        return view('school.admin.events.edit', compact('events'), compact('files'));
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
        $events = new Events;
        $events = $events->where('id', $id)->First();
        $events->img = $request->img;
        $events->title = $request->title;
        $events->from = $request->from;
        $events->description = $request->description;
        $events->to = $request->to;
        $events->update();
        return redirect('admin/event');
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
        $events = new Events;
        $events = $events->where('id', $id)->first();;
        $events->delete();
        return redirect('admin/event')->with('message', 'Your data has been deleted');
    }
}