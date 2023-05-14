<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = new Files;
        $files = $files->paginate(4);
        return view('school.admin.Files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.admin.Files.create');
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
        //
        $files = new Files;
        $validate_data = $request->validate(
            [
                'title' => 'required',
                'img' => 'required',
            ]
        );
        $fileName = $request->id . '-' . time() . '.' . $request->img->extension();
        $request->img->move(public_path('uploads'), $fileName);
        $files->title = $request->title;
        $files->img = $fileName;

        $files->save();
        return redirect('admin/file')->with('message', 'Your data is submitted ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $files = new Files;
        $files = $files->where('id', $id)->First();
        return view('school.admin.Files.show', compact('files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Id  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $files = new Files;
        $files = $files->where('id', $id)->First();
        return view('school.admin.Files.edit', compact('files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Id  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $files = new Files;
        $files = $files->where('id', $id)->First();
        $files->title = $request->title;
        if ($request->img != NULL) {
            $fileName = $request->course_code . "-" . time() . '.' . $request->img->extension();
            File::delete(public_path('uploads/' . $files->img));
            $request->img->move(public_path('uploads'), $fileName);
            $files::where('id', $id)
                ->update([
                    'img' => $fileName,
                ]);
        }
        $files->update();
        return redirect('admin/file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Id  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $files = new Files;
        $files = $files->where('id', $id)->first();;
        File::delete(public_path('uploads/' . $files->img));
        $files->delete();

        return redirect('admin/file')->with('message', 'Your data has been deleted');
    }
}
