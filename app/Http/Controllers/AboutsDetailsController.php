<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use App\Models\aboutsDetails;

class AboutsDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutsDetails = new AboutsDetails;
        $aboutsDetails = $aboutsDetails->paginate(4);
        return view('school.admin.AboutsDetails.index', compact('aboutsDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = Files::paginate(10);
        return view('school.admin.AboutsDetails.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aboutsDetails = new AboutsDetails;
        $validate_data = $request->validate(
            [
                'img' => 'required',
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $aboutsDetails->img = $request->img;
        $aboutsDetails->title = $request->title;
        $aboutsDetails->description = $request->description;
        $aboutsDetails->save();
        return redirect('admin/aboutDetail')->with('message', 'Your data is submitted ');
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
        $aboutsDetails = new AboutsDetails;
        $aboutsDetails = $aboutsDetails->where('id', $id)->First();
        return view('school.admin.AboutsDetails.show', compact('aboutsDetails', 'files'));
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
        $aboutsDetails = new AboutsDetails;
        $aboutsDetails = $aboutsDetails->where('id', $id)->First();
        return view('school.admin.AboutsDetails.edit', compact('aboutsDetails', 'files'));
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
        $aboutsDetails = new AboutsDetails;
        $aboutsDetails = $aboutsDetails->where('id', $id)->First();
        $aboutsDetails->img = $request->img;
        $aboutsDetails->title = $request->title;
        $aboutsDetails->description = $request->description;
        $aboutsDetails->update();
        return redirect('admin/aboutDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutsDetails = new AboutsDetails;
        $aboutsDetails = $aboutsDetails->where('id', $id)->first();;
        $aboutsDetails->delete();
        return redirect('admin/aboutDetail')->with('message', 'Your data has been deleted');
    }
}