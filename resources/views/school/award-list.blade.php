@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center">
        <h1>Awards</h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span> / Pages / Awards</span>
        </p>
    </div>
    </div>

    <div id="contact" class="section wb">
        <div class="container">
            <div class="row">
                @foreach ($awards as $award)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="course-item">
                            <div class="image-blog">
                                <img src="{{ asset('uploads/' . $award->img) }}" alt="" class="img-fluid">
                            </div>
                            <div class="course-br">
                                {{-- enroll --}}
                                <div class="course-title">
                                    <h2><a href="#" title="" data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $award->id }}">{{ $award->name }}</a></h2>
                                    <h3><span><i class="fa-solid fa-trophy"></i></span> <a href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalId{{ $award->id }}">{{ $award->trophyName }}</a></h3>
                                </div>
                                <!-- Modal trigger button -->
                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId{{ $award->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fs-3" id="modalTitleId">Award Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-5"><img src="{{ asset('uploads/' . $award->img) }}"
                                                            alt="award_img" class="w-100"></div>
                                                    <div class="col-lg-6 p-2">
                                                        <h1 class="text-left">{{ $award->trophyName }}</h1>
                                                        <h3 class="text-left">{{ $award->name }}</h3>
                                                        <p class="text-justify">{{ $award->description }}</p>
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
                                <div class="course-desc">
                                    <p>{{ \Illuminate\Support\Str::limit($award->description, 100, '...') }}</p>
                                </div>
                            </div>

                        </div>
                    </div><!-- end col -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection
