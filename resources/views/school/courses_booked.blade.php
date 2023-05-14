@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center">
        <h1>Course Booked </h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span> / Pages / Course Booked</span>
        </p>
    </div>
    </div>

    <div id="coursesBooked" class="section wb container">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered table-lg table-responsive-lg">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">CourseName</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admissions as $admission)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img src="{{ asset('formimg/' . $admission->img) }}" width="120px" height="100px"
                                        alt="no"></td>
                                <td>{{ $admission->name }}</td>
                                <td>{{ $admission->courseName }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- end section -->
@endsection
