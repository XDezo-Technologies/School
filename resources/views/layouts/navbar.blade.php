<!-- LOADER -->
<div id="preloader">
    <div class="loader-container">
        <div class="progress-br float shadow">
            <div class="progress__item"></div>
        </div>
    </div>
</div>
<!-- END LOADER -->

<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                @foreach ($settings as $set)
                    @if ($set->siteKey == 'navLogo')
                        <img src="{{ asset('uploads/' . $set->siteValue) }}" alt="" />
                    @endif
                @endforeach
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host"
                aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-host">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('abouts') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ url('/abouts') }}">About Us</a></li>
                    <li class="nav-item {{ Request::is('courses') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ url('/courses') }}">Course </a>
                    </li>
                    <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ url('/blogs') }}">Blog </a>
                    </li>
                    <li class="nav-item {{ Request::is('teachers') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ url('/teachers') }}">Teachers</a></li>
                    <li class="nav-item {{ Request::is('contacts') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ url('/contacts') }}">Contact</a></li>
                    <li class="nav-item dropdown {{ Request::is('pages') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="{{ url('/messages') }}">Message from principal </a>
                            @if (Auth::check())
                                <a class="dropdown-item" href="{{ url('/booked') }}">Booked Courses </a>
                                <a class="dropdown-item" href="{{ url('/results') }}">Result </a>
                            @endif
                            <a class="dropdown-item" href="{{ url('/notices') }}">Notice </a>
                            <a class="dropdown-item" href="{{ url('/events') }}">Events </a>
                            <a class="dropdown-item" href="{{ url('/galleries') }}">Gallery </a>
                            <a class="dropdown-item" href="{{ url('/awards') }}">Awards </a>
                            <a class="dropdown-item" href="{{ url('/boards') }}">Board of director </a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link btn btn-warning border-light"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->
