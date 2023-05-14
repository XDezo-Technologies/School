<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonials;
use App\Models\Files;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = new Testimonials;
        $testimonials = $testimonials->paginate(4);
        return view('school.admin.Testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = Files::paginate(10);
        return view('school.admin.Testimonials.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonials = new Testimonials;
        $validate_data = $request->validate(
            [
                'img' => 'required',
                'name' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]
        );
        $testimonials->img = $request->img;
        $testimonials->name = $request->name;
        $testimonials->subject = $request->subject;
        $testimonials->message = $request->message;

        $testimonials->save();
        return redirect('admin/testimonial')->with('message', 'Your data is submitted ');
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
        $testimonials = new Testimonials;
        $testimonials = $testimonials->where('id', $id)->First();
        return view('school.admin.Testimonials.show', compact('testimonials'), compact('files'));
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
        $testimonials = new Testimonials;
        $testimonials = $testimonials->where('id', $id)->First();
        return view('school.admin.Testimonials.edit', compact('testimonials', 'files'));
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
        $testimonials = new Testimonials;
        $testimonials = $testimonials->where('id', $id)->First();
        $testimonials->img = $request->img;
        $testimonials->name = $request->name;
        $testimonials->subject = $request->subject;
        $testimonials->message = $request->message;
        $testimonials->update();
        return redirect('admin/testimonial');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonials = new Testimonials;
        $testimonials = $testimonials->where('id', $id)->first();;
        $testimonials->delete();
        return redirect('admin/testimonial')->with('message', 'Your data has been deleted');
    }
}
