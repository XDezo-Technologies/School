<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>About US</h3>
                    </div>
                    @foreach ($settings as $set)
                        @if ($set->siteKey == 'footerAbout')
                            <p> {{ $set->siteValue }}</p>
                        @endif
                    @endforeach
                    <div class="footer-right">
                        <ul class="footer-links-soi">
                            @foreach ($settings as $set)
                                @if ($set->siteKey == 'facebook')
                                    <li><a href="{{ $set->siteValue }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                @endif
                                @if ($set->siteKey == 'github')
                                    <li><a href="{{ $set->siteValue }}" target="_blank"><i class="fa fa-github"></i></a>
                                    </li>
                                @endif
                                @if ($set->siteKey == 'twitter')
                                    <li><a href="{{ $set->siteValue }}" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                @endif
                                @if ($set->siteKey == 'pinterest')
                                    <li><a href="{{ $set->siteValue }}" target="_blank"><i
                                                class="fa fa-pinterest"></i></a></li>
                                @endif
                            @endforeach
                        </ul><!-- end links -->
                    </div>
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Information Link</h3>
                    </div>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/blogs') }}">Blog</a></li>
                        <li><a href="{{ url('/courses') }}">Courses</a></li>
                        <li><a href="{{ url('/abouts') }}">About</a></li>
                        <li><a href="{{ url('/contacts') }}">Contact</a></li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Contact Details</h3>
                    </div>

                    <ul class="footer-links">
                        @foreach ($settings as $set)
                            @if ($set->siteKey == 'mail')
                                <li><a href="mailto:{{ $set->siteValue }}">{{ $set->siteValue }}</a></li>
                            @endif
                            @if ($set->siteKey == 'urSite')
                                <li><a href="{{ $set->siteValue }}">{{ $set->siteValue }}</a></li>
                            @endif
                            @if ($set->siteKey == 'address')
                                <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                            @endif

                            @if ($set->siteKey == 'contactNumber')
                                <li><a href="tel:{{ $set->siteValue }}">{{ $set->siteValue }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="copyrights">
    <div class="container">
        <div class="footer-distributed">
            <div class="footer-center">
                @foreach ($settings as $set)
                    @if ($set->siteKey == 'copyright')
                        <p class="footer-company-name">{{ $set->siteValue }}
                            {{-- Design By : <a href="yas.com.np">Yas</a> --}}
                        </p>
                    @endif
                @endforeach
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end copyrights -->

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<!-- ALL JS FILES -->
<script src="{{ asset('frontend/js/all.js') }}"></script>
<!-- ALL PLUGINS -->
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script src="{{ asset('frontend/js/timeline.min.js') }}"></script>
<script>
    timeline(document.querySelectorAll('.timeline'), {
        forceVerticalMode: 700,
        mode: 'horizontal',
        verticalStartPosition: 'left',
        visibleItems: 4
    });
</script>
{{-- swiper and jquery --}}
<script>
    // JavaScript code for the gallery
    const galleryInner = document.querySelector('.gallery-inner');
    const galleryPrev = document.querySelector('.gallery-prev');
    const galleryNext = document.querySelector('.gallery-next');

    let currentIndex = 0;

    galleryPrev.addEventListener('click', () => {
        currentIndex = Math.max(currentIndex - 1, 0);
        galleryInner.style.transform =
            `translateX(-${currentIndex * 33.3333}%)`; /* Change this value to adjust the number of images shown */
    });

    galleryNext.addEventListener('click', () => {
        currentIndex = Math.min(currentIndex + 1,
            2); /* Change this value to adjust the number of images shown */
        galleryInner.style.transform =
            `translateX(-${currentIndex * 33.3333}%)`; /* Change this value to adjust the number of images shown */
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
</body>

</html>
