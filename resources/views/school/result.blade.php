@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center">
        <h1>Result </h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span> / Pages / Result</span>
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
                            <th scope="col">Student Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Full marks</th>
                            <th scope="col">Pass marks</th>
                            <th scope="col">Aquired marks</th>
                            <th scope="col">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->subject }}</td>
                                <td>{{ $result->full_marks }}</td>
                                <td>{{ $result->pass_marks }}</td>
                                <td>{{ $result->acquired_marks }}</td>
                                <td>{{ $result->remarks }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- end section -->
@endsection
