@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center">
        <h1>Courses </h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span>/ Course</span>
        </p>
    </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    @foreach ($settings as $set)
                        @if ($set->siteKey == 'courseDesc')
                            <p class="lead">{{ $set->siteValue }}</p>
                        @endif
                    @endforeach
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="course-item">
                            <div class="image-blog">
                                <img src="{{ asset('uploads/' . $course->img) }}" alt="" class="img-fluid">
                            </div>
                            <div class="course-br">

                                <div class="course-title">
                                    <h2><a href="#" title="" data-bs-target="#exampleModal"
                                            data-bs-toggle="modal">{{ $course->title }}</a></h2>
                                    <!-- Button trigger modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg  ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-5"><img
                                                                src="{{ asset('uploads/' . $course->img) }}"
                                                                alt="course_img" class="w-100"></div>
                                                        <div class="col-lg-6 p-2">
                                                            <div class=" m-3 w-100">
                                                                <h1 class="text-left">{{ $course->title }}</h1>
                                                                <p class="text-justify">{{ $course->description }}</p>
                                                                <p class="text-justify">{{ $course->description2 }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="course-desc">
                                        <p>{{ $course->description }}</p>
                                    </div>

                                    <div class="blog-button">
                                        @if (Auth::check())
                                            <a class="hover-btn-new orange m-2"
                                                href="{{ url('/enroll', ['id' => $course->courseID]) }}"><span>Enroll</span></a>
                                        @else
                                            <p>Log in to Book</p>
                                        @endif
                                    </div>
                                    {{-- enroll --}}
                                </div>
                                <div class="course-meta-bot">
                                    <ul>
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> {{ $course->courselength }}
                                            months
                                        </li>
                                        <li><i class="fa fa-users" aria-hidden="true"></i> {{ $course->capacity }} Student
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end col -->
                @endforeach
            </div><!-- end row -->

            <hr class="hr3">
        </div><!-- end container -->
    </div><!-- end section -->
@endsection
