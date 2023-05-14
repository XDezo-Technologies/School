@extends('layouts.main')
@section('middle')
    @foreach ($settings as $set)
        @if ($set->siteKey == 'Banner')
            <div class="all-title-box" style="background: url({{ asset('uploads/' . $set->siteValue) }}) no-repeat;">
        @endif
    @endforeach
    <div class="container text-center">
        <h1>Principal Message</h1>
        <p>
            <a href="{{ url('/') }}" class="text-white">Home</a>
            <span> / Pages / Principal Message</span>
        </p>
    </div>
    </div>

    <div id="contact" class="section wb">
        <div class="container">
            <div class="card bg-light shadow p-3 mb-5  rounded">
                <div class="row ">
                    @foreach ($messageFromPrincipal as $message)
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="img"><img src="{{ asset('uploads/' . $message->img) }}" alt="principal"
                                    width="100%"></div>
                        </div><!-- end col -->
                        <div class="col-xl-8 col-md-6 col-sm-12">
                            <h1 class="fs-1">{{ $message->title }}</h1>
                            <p class=" text-justify">{{ $message->description }}
                            </p>

                            <div class="name fs-2">{{ $message->location }}</div>
                            <div class="post fs-2">{{ $message->name }}</div>
                        </div>
                    @endforeach
                </div><!-- end row -->
            </div>
        </div><!-- end container -->
    </div><!-- end section -->
@endsection
