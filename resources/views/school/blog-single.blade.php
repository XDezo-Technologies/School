@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="row container p-3">
        <div class="col-6">
            <a href="{{ url('blogs') }}" class="btn btn-primary btn-md">Back</a>
        </div>
        <div class="col-6">
            <h1 class="fs-1">Blog-single</h1>
            <p>
                <a href="{{ url('/') }}" class="text-white">Home</a>
                <span> / Blog / Blog-Single </span>
            </p>
        </div>
    </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 blog-post-single">

                    {{--  @foreach ($blogs as $blog)  --}}
                    <div class="blog-item">
                        <div class="image-blog">
                            <img src="{{ asset('uploads/' . $blog->img) }}" alt="" class="img-fluid">
                        </div>
                        <div class="post-content">
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a
                                        href="#">{{ date('F j, Y', strtotime($blog->created_at)) }}</a> </span>
                                <span><i class="fa fa-tag"></i> <a href="#">{{ $blog->type }}</a> </span>
                            </div>
                            <div class="blog-title">
                                <h2><a href="#" title="">{{ $blog->title }}</a></h2>
                            </div>
                            <div class="blog-desc">
                                <p>{{ $blog->description }} </p>
                                <blockquote class="default">
                                    {{ $blog->highlight }}
                                </blockquote>
                                <p>{{ $blog->description2 }} </p>

                            </div>
                        </div>
                    </div>
                    {{--  @endforeach  --}}
                    <div class="blog-author">
                        <div class="author-bio">
                            <h3 class="author_name"><a href="#">{{ $blog->writerName }} </a></h3>
                            <h5>{{ $blog->post }} </a></h5>
                            <p class="author_det">
                                {{ $blog->writerView }}
                            </p>
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection
