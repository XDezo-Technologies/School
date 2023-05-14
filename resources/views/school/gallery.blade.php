@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center">
        <h1>Gallery</h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span> / Pages / Gallery</span>
        </p>
    </div>
    </div>
    <div id="overviews" class="section wb p-5">
        <div class="container"></div>
        <div class="section-title row text-center">
            <div class="col-md-8 offset-md-2">
                <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem
                    quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
            </div>
        </div><!-- end title -->

        <hr class="invis">

        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="course-item">
                        <div class="image-blog mb-2">
                            <a href="{{ asset('uploads/' . $gallery->img) }}" data-toggle="lightbox">
                                <img src="{{ asset('uploads/' . $gallery->img) }}"
                                    style="max-height: 300px ;
                                height:100%;;">
                            </a>
                            <h3>{{ $gallery->title }}</h3>
                        </div>
                    </div>
                </div><!-- end col -->
            @endforeach

        </div><!-- end row -->
    </div><!-- end container -->
    <script>
        import Lightbox from 'bs5-lightbox';

        const options = {
            keyboard: true,
            size: 'fullscreen'
        };

        document.querySelectorAll('.my-lightbox-toggle').forEach((el) => el.addEventListener('click', (e) => {
            e.preventDefault();
            const lightbox = new Lightbox(el, options);
            lightbox.show();
        }));
    </script>
@endsection
