@extends('layouts.main')
@section('middle')
    <div id="overviews" class="section wb">
        <div class="container">
            <hr class="invis">
            <div class="container">
                <h1>How to Register</h1>
                <ul>
                    <li>Download the pdf file from button below.</li>
                    <li>Fill in Your full proper name that goes along with form.</li>
                    <li>Click a picture of form filled pdf and upload it.</li>
                    <li>If the image of pdf and your details is sketchy it will be declined.</li>
                    <li>The accept letter will be send in email.</li>
                </ul>
                <a href="{{ asset('admitform.pdf') }}" download="Form.pdf" class="btn btn-lg btn-primary mb-2">Download
                    PDF</a>

            </div>
            <h1>Admission Form</h1>
            <form action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="mb-3">
                                <label for="exampleInputName1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1"
                                    aria-describedby="nameHelp" name="name">
                                @error('name')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        {{--  @foreach ($courses as $course)  --}}
                        <div class="col-lg-6 col-md-6 col-sm-6 ">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">CourseID</label>
                                <input type="text" class="form-control" id="exampleInputCourseID1"
                                    aria-describedby="courseIDHelp" readonly name="courseID"
                                    value="{{ $courses->courseID }}">
                                @error('courseID')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        {{--  @endforeach  --}}
                        <div class="col-lg-6 col-md-6 col-sm-6 ">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">studentID</label>
                                <input type="text" class="form-control" id="exampleInputStudentID1"
                                    aria-describedby="studentIDHelp" readonly name="studentID"
                                    value=" {{ Auth::user()->id }}">
                                @error('studentID')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="mb-3">

                                <label for="exampleFormControlTextarea1" class="form-label">courseName</label>
                                <input type="text" class="form-control" id="exampleInputcourseName1"
                                    aria-describedby="courseNameHelp" readonly name="courseName"
                                    value="{{ $courses->title }}">
                                @error('courseName')
                                    <small>{{ $courseName }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="img"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/course') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" name="submit" data-bs-dismiss="modal">Submit</button>
                </div>
            </form>

            <hr class="hr3">
        </div><!-- end container -->
    </div><!-- end section -->
@endsection
