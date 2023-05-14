<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Models\Files;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactForms = new ContactForm;
        $contactForms = $contactForms->paginate(4);
        return view('school.admin.Contact_form.index', compact('contactForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.admin.Contact_form.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactForms = new ContactForm;
        $validate_data = $request->validate(
            [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required',
            ]
        );
        $contactForms->firstName = $request->firstName;
        $contactForms->lastName = $request->lastName;
        $contactForms->email = $request->email;
        $contactForms->phone = $request->phone;
        $contactForms->message = $request->message;

        $contactForms->save();
        return redirect('/contacts')->with('message', 'Your data is submitted ');
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
        $contactForms = new ContactForm;
        $contactForms = $contactForms->where('id', $id)->First();
        return view('school.admin.Contact_form.show', compact('contactForms'), compact('files'));
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
        $contactForms = new ContactForm;
        $contactForms = $contactForms->where('id', $id)->First();
        return view('school.admin.Contact_form.edit', compact('contactForms', 'files'));
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
        $contactForms = new ContactForm;
        $contactForms = $contactForms->where('id', $id)->First();
        $contactForms->firstName = $request->firstName;
        $contactForms->lastName = $request->lastName;
        $contactForms->email = $request->email;
        $contactForms->phone = $request->phone;
        $contactForms->message = $request->message;
        $contactForms->update();
        return redirect('admin/contactForm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactForms = new ContactForm;
        $contactForms = $contactForms->where('id', $id)->first();;
        $contactForms->delete();
        return redirect('admin/contactForm')->with('message', 'Your data has been deleted');
    }
}