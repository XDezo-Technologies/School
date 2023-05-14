@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center">
        <h1>Boards Of Directors</h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span> / Pages / Boards Of Directors</span>
        </p>
    </div>
    </div>

    <div id="boards" class="section wb">
        <div class="container">
            <div class="row">
                @foreach ($boards as $board)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="our-team">
                            <div class="team-img">
                                <img src="{{ asset('uploads/' . $board->img) }}">
                                <div class="social">
                                    <ul>
                                        <li><a href="#" class="fa fa-chain" title="Details" data-bs-toggle="modal"
                                                data-bs-target="#modalId{{ $board->boardID }}"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-content overflow-hidden" data-bs-toggle="modal"
                                data-bs-target="#modalId{{ $board->boardID }}" style=" cursor:pointer">
                                <h3 class="title ">{{ $board->name }}</h3>
                                <span class="post">{{ $board->post }}</span>
                            </div>

                            <!-- Modal trigger button -->
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId{{ $board->boardID }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fs-3" id="modalTitleId">Board Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-5"><img src="{{ asset('uploads/' . $board->img) }}"
                                                        alt="board_img" class="w-100"></div>
                                                <div class="col-lg-6 p-2">
                                                    <div class="card border-dark m-3 w-100">
                                                        <div class="card-body text-primary  text-left">
                                                            <h3>Name : <strong>{{ $board->name }}</strong></h3>
                                                            <h3>Post : <strong>{{ $board->post }}</strong></h3>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <h1 class="text-left">About Me</h1>
                                                    <p class="text-justify">{{ $board->description }}</p>
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


    <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    </script>
@endsection
