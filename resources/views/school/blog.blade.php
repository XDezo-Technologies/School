@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center">
        <h1>Blog<span class="m_1"></span></h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span>/ Blog</span>
        </p>
    </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem
                        quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="blog-item">
                            <div class="image-blog">
                                <img src="{{ asset('uploads/' . $blog->img) }}" alt="" class="img-fluid">
                            </div>
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a
                                        href="#">{{ date('F j, Y', strtotime($blog->created_at)) }}
                                </span>
                                <span><i class="fa fa-tag"></i> <a href="#">News</a> </span>
                            </div>
                            <div class="blog-title">
                                <h2><a href="#" title="">{{ $blog->title }}</a></h2>
                            </div>
                            <div class="blog-desc">
                                <p>{{ $blog->description }} </p>
                            </div>
                            <div class="blog-button">
                                <a class="hover-btn-new orange"
                                    href="{{ url('blogsSingles', ['id' => $blog->id]) }}"><span>Read More<span></a>
                            </div>
                        </div>
                    </div><!-- end col -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection
