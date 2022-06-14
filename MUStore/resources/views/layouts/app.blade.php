<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">

    <!-- Ikony -->
    <script src="https://kit.fontawesome.com/2663ccdbee.js" crossorigin="anonymous"></script>

    <!--LeaFlet map-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="modal fade" id="prodModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" id="modHead"></div>
                <div class="modal-body" id="ModalContent">
                    <div class="row">
                        <div class="col-lg-6 col-12" id="modInf">
                        </div>
                        <div class="col-lg-6 col-12" id="modImg">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                </div>
            </div>
        </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand text-white" id="b1" href="{{ url('/') }}"><i class="fas fa-drum"
                        style="color: white;"></i>
                    MUstore</a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" id="b2"
                                href="{{ route('product.guitars') }}">{{ __('Gitary') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="b3"
                                href="{{ route('product.basses') }}">{{ __('Basy') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="b4"
                                href="{{ route('product.keyboards') }}">{{ __('Klawisze
                                MIDI') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="b5"
                                href="{{ route('product.vinyls') }}">{{ __('Płyty
                                winylowe') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="b6"
                                href="{{ route('product.softwares') }}">{{ __('Software') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="b7"
                                href="{{ route('contact') }}">{{ __('Kontakt') }}</a>
                        </li>
                        @auth
                            <!-- koszyk jest widoczny jedynie dla zalogowanych użytkowników -->
                            <li class="nav-item">
                                <a class="nav-link text-white" id="b8"
                                    href="{{ route('cart', ['user' => Auth()->user()]) }}">{{ __('Koszyk') }}</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('editMenu', ['user' => Auth()->user()]) }}">{{ __('Edytuj dane') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div id="carous">
            <div id="carouselExampleControls" class="carousel slide carousel-dark" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ url('images/slide/1.png') }}" class="d-block w-100" alt="slide1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('images/slide/2.png') }}" class="d-block w-100 " alt="slide2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('images/slide/3.png') }}" class="d-block w-100" alt="slide3">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('images/slide/4.png') }}" class="d-block w-100" alt="slide4">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="text-center text-white bg-dark">
            <h1 class="display-4 py-2 m-0">
                @yield('category')
            </h1>
        </div>

        <div class="container">
            <main class="py-5">
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="bg-dark text-center text-white mt-auto">
        <div class="container">
            <!-- Grid container -->
            <div class="container p-4">
                <!-- Section: Social media -->
                <section>
                    <h5 class="text-uppercase">NASZE SOCIAL MEDIA</h5>
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/" role="button">
                        <i class="fab fa-facebook-f"></i></a>
                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/" role="button">
                        <i class="fab fa-twitter"></i></a>
                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/" role="button">
                        <i class="fab fa-instagram"></i></a>
                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="https://pl.linkedin.com/" role="button">
                        <i class="fab fa-linkedin-in"></i></a>
                </section>
                <!-- Section: Social media -->
                <!-- Section: Contact -->
                <section>
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <h5 class="text-uppercase">KONTAKT</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <b>IMIĘ I NAZWISKO</b><br>Dawid Nalepa<br>
                            </li>
                            <li>
                                <b>ADRES</b><br>ul. Muzyczna 7, 20-618 Lublin<br>
                            </li>
                            <li>
                                <b>TELEFON</b><br>+48 123456789<br>
                            </li>
                            <li>
                                <b>E-MAIL</b><br>dawid.nalepa@pollub.edu.pl
                            </li>
                        </ul>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Contact-->
            </div>
            <!-- Grid container -->
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Copyright: Dawid Nalepa
            </div>
            <!-- Copyright -->
        </div>
    </footer>

</body>

</html>
