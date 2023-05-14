<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messagefromprincipal;
use App\Models\Files;

class MessagefromprincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messagefromprincipals = new Messagefromprincipal;
        $messagefromprincipals = $messagefromprincipals->paginate(4);
        return view('school.admin.Principal_Message.index', compact('messagefromprincipals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = Files::paginate(10);
        return view('school.admin.Principal_Message.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messagefromprincipals = new Messagefromprincipal;
        $validate_data = $request->validate(
            [
                'img' => 'required',
                'title' => 'required',
                'description' => 'required',
                'name' => 'required',
                'location' => 'required',
            ]
        );
        $messagefromprincipals->img = $request->img;
        $messagefromprincipals->title = $request->title;
        $messagefromprincipals->description = $request->description;
        $messagefromprincipals->name = $request->name;
        $messagefromprincipals->location = $request->location;

        $messagefromprincipals->save();
        return redirect('admin/messagefromprincipal')->with('message', 'Your data is submitted ');
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
        $messagefromprincipals = new Messagefromprincipal;
        $messagefromprincipals = $messagefromprincipals->where('id', $id)->First();
        return view('school.admin.Principal_Message.show', compact('messagefromprincipals'), compact('files'));
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
        $messagefromprincipals = new Messagefromprincipal;
        $messagefromprincipals = $messagefromprincipals->where('id', $id)->First();
        return view('school.admin.Principal_Message.edit', compact('messagefromprincipals', 'files'));
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
        $messagefromprincipals = new Messagefromprincipal;
        $messagefromprincipals = $messagefromprincipals->where('id', $id)->First();
        $messagefromprincipals->img = $request->img;
        $messagefromprincipals->title = $request->title;
        $messagefromprincipals->description = $request->description;
        $messagefromprincipals->name = $request->name;
        $messagefromprincipals->location = $request->location;
        $messagefromprincipals->update();
        return redirect('admin/messagefromprincipal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $messagefromprincipals = new Messagefromprincipal;
        $messagefromprincipals = $messagefromprincipals->where('id', $id)->first();;
        $messagefromprincipals->delete();
        return redirect('admin/messagefromprincipal')->with('message', 'Your data has been deleted');
    }
}