@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center">
        <h1>About Us<span class="m_1"></span></h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span>/ About Us</span>
        </p>
    </div>
    </div>

    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>About</h3>
                    @foreach ($settings as $set)
                        @if ($set->siteKey == 'aboutDesc')
                            <p class="lead">{{ $set->siteValue }}</p>
                        @endif
                    @endforeach
                </div>
            </div><!-- end title -->
            <div class="row align-items-center">
                @foreach ($abouts as $about)
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="message-box">
                            <h4>{{ $about->top_title }}</h4>
                            <h2>{{ $about->title }}</h2>
                            <p>{{ $about->top_description }}</p>

                            <p>{{ $about->description }} </p>
                        </div><!-- end messagebox -->
                    </div><!-- end col -->

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="post-media wow fadeIn">
                            <img src="{{ asset('uploads/' . $about->img) }}" alt="" class="img-fluid img-rounded">
                        </div><!-- end media -->
                    </div><!-- end col -->
                @endforeach
            </div>
            <div class="row align-items-center">
                @foreach ($aboutsDetails as $aboutsDetail)
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="post-media wow fadeIn">
                            <img src="{{ asset('uploads/' . $aboutsDetail->img) }}" alt=""
                                class="img-fluid img-rounded">
                        </div><!-- end media -->
                    </div><!-- end col -->

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="message-box">
                            <h2>{{ $aboutsDetail->title }}</h2>
                            <p>{{ $aboutsDetail->description }}</p>

                        </div><!-- end messagebox -->
                    </div><!-- end col -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="hmv-box">
        <div class="container">
            <h1 class="md-3 fs-3 text-center">Direction</h1>
            <div class="row">
                @foreach ($directions as $direction)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="inner-hmv">
                            <div class="icon-box-hmv"><i class="{{ $direction->logo }}"></i></div>
                            <h3>{{ $direction->title }}</h3>
                            {{--  <div class="tr-pa">{{ strtok($direction->title, ' ') }}</div>  --}}
                            <p>{{ $direction->description }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

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
    <!-- HTML code for the gallery -->
@endsection
