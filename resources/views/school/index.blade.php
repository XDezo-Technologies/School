@extends('layouts.main')
@section('middle')
    <div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover"
        data-interval="false">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach ($sliders as $index => $slider)
                <li data-target="#carouselExampleControls" data-slide-to="{{ $index }}"
                    @if ($index == 0) class="active" @endif></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($sliders as $index => $slider)
                <div class="carousel-item @if ($index == 0) active @endif">
                    <div id="home" class="first-section"
                        style="background-image:url({{ asset('uploads/' . $slider->img) }});">
                        <div class="dtab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 text-right">
                                        <div class="big-tagline">
                                            <h2><strong>{{ $slider->title }} </strong>{{ $slider->title2 }}</h2>
                                            <p class="lead">{{ $slider->description }} </p>
                                            <a href="{{ url('/contact') }}" class="hover-btn-new"><span>Contact
                                                    Us</span></a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{ url('/about') }}" class="hover-btn-new"><span>Read
                                                    More</span></a>
                                        </div>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end container -->
                        </div>
                    </div><!-- end section -->
                </div>
            @endforeach
        </div>
        <!-- Left Control -->
        <a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div id="overviews" class="section wb">
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
        </div><!-- end container -->
    </div><!-- end section -->

    <section class="section lb page-section">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Our history</h3>
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,
                        lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
                </div>
            </div><!-- end title -->
            <div class="timeline">
                <div class="timeline__wrap">
                    <div class="timeline__items">
                        @foreach ($histories as $history)
                            <div class="timeline__item">
                                <div class="timeline__content"
                                    style="background: url({{ asset('uploads/' . $history->img) }}); no-repeat center;background-size: cover;">
                                    <h2>{{ $history->date }}</h2>
                                    <p>{{ $history->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="gallery-container p-5 bg-light">
        <h1 class="fs-1 text-center">Facts</h1>
        <div class="row text-left stat-wrap overflow-hidden">
            <div class="gallery-inner">
                @foreach ($facts as $fact)
                    <div class="col-md-3 col-sm-3 col-xs-12 gallery-item">
                        <span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i
                                class="{{ $fact->logo }}"></i></span>
                        <p class="stat_count">{{ $fact->number }}</p>
                        <h3>{{ $fact->title }}</h3>
                    </div><!-- end col -->
                @endforeach
            </div>
        </div><!-- end row -->
        <button class="gallery-prev" type="button">&lt;</button>
        <button class="gallery-next" type="button">&gt;</button>

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
    <div class="gallery-container p-5 bg-light">
        <div>
            <h1>Gallery</h1>
            <h3>These are some picture of our school</h3>
        </div>
        <div class="gallery-inner">
            @foreach ($galleries as $gallery)
                <div class="gallery-item">
                    <img src="{{ asset('uploads/' . $gallery->img) }}" alt="Image 1"
                        style="max-height: 300px;
                        height:100%
                    " />
                </div>
            @endforeach
        </div>
        <button class="gallery-prev" type="button">&lt;</button>
        <button class="gallery-next" type="button">&gt;</button>
        <div class="container py-2 text-center">
            <a href="{{ url('/galleries') }}" class="btn btn-primary">View More</a>
        </div>
    </div>
@endsection
