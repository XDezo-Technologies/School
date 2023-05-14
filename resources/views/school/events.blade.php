@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center my-2">
        <h1>Events</h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span> / Pages / Events</span>
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
                @foreach ($events as $event)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="course-item">
                            <div class="image-blog">
                                <img src="{{ asset('uploads/' . $event->img) }}" alt="" class="img-fluid"
                                    data-bs-toggle="modal" data-bs-target="#modalId{{ $event->id }}">
                            </div>
                            <div class="course-br">
                                {{-- enroll --}}
                                <div class="course-title">
                                    <h2><a href="#" title="" data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $event->id }}">{{ $event->title }}</a></h2>
                                </div>
                                <div class="course-desc">
                                    <p>{{ \Illuminate\Support\Str::limit($event->description, 100, '...') }}</p>
                                </div>
                            </div>
                            <!-- Modal trigger button -->
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId{{ $event->id }}" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fs-3" id="modalTitleId">Event Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-5"><img src="{{ asset('uploads/' . $event->img) }}"
                                                        alt="event_img" class="w-100"></div>
                                                <div class="col-lg-6 p-2">
                                                    <h1 class="text-left">{{ $event->title }}</h1>
                                                    <p class="text-justify">{{ $event->description }}</p>
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
                            <div class="course-meta-bot">
                                <ul>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $event->from }}</li>
                                    <li>-</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $event->to }}</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end col -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection
