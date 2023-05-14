@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center">
        <h1>Teachers</h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span>/ Teachers</span>
        </p>
    </div>
    </div>

    <div id="teachers" class="section wb">
        <div class="container">
            <div class="row">
                @foreach ($teachers as $teacher)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="our-team">
                            <div class="team-img">
                                <img src="{{ asset('uploads/' . $teacher->img) }}">
                                <div class="social">
                                    <ul>
                                        <li><a href="#" class="fa fa-chain" title="Details" data-bs-toggle="modal"
                                                data-bs-target="#modalId{{ $teacher->teacherID }}"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-content overflow-hidden" data-bs-toggle="modal"
                                data-bs-target="#modalId{{ $teacher->teacherID }}" style=" cursor:pointer">
                                <h3 class="title ">{{ $teacher->name }}</h3>
                                <span class="post">{{ $teacher->post }}</span>
                            </div>

                            <!-- Modal trigger button -->
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId{{ $teacher->teacherID }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fs-3" id="modalTitleId">Teacher Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-5"><img src="{{ asset('uploads/' . $teacher->img) }}"
                                                        alt="teacher_img" class="w-100"></div>
                                                <div class="col-lg-6 p-2">
                                                    <div class="card border-dark m-3 w-100">
                                                        <div class="card-body text-primary  text-left">
                                                            <h3>Name : <strong>{{ $teacher->name }}</strong></h3>
                                                            <h3>Post : <strong>{{ $teacher->post }}</strong></h3>
                                                            <h3>Field : <strong>{{ $teacher->field }}</strong></h3>
                                                            <h3>Experience : <strong>{{ $teacher->experience }}</strong>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <h1 class="text-left">About Me</h1>
                                                    <p class="text-justify">{{ $teacher->description }}</p>
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
                    </div>
                @endforeach

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('images/parallax_04.jpg');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Testimonials</h3>
                @foreach ($settings as $set)
                    @if ($set->siteKey == 'TestiDescription')
                        <p class="lead">{{ $set->siteValue }}</p>
                    @endif
                @endforeach
            </div><!-- end title -->

            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="testi-carousel owl-carousel owl-theme">
                        @foreach ($testimonials as $testimonial)
                            <div class="testimonial clearfix">
                                <div class="testi-meta">
                                    <img src="{{ asset('uploads/' . $testimonial->img) }}" alt="testi"
                                        class="img-fluid">
                                    <h4>{{ $testimonial->name }} </h4>
                                </div>
                                <div class="desc">
                                    <h3><i class="fa fa-quote-left"></i> {{ $testimonial->subject }}</h3>
                                    <p class="lead">{{ $testimonial->message }}</p>
                                </div>
                                <!-- end testi-meta -->
                            </div>
                            <!-- end testimonial -->
                        @endforeach
                    </div><!-- end carousel -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    </script>
@endsection
