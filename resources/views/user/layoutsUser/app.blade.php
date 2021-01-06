<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Bandarmasih Plant
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/produk">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/kategori">Kategori Produk</a>
                            </li>
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Daftar?</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/produk">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/kategori">Kategori Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/pesan">Pesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/panduan_pembayaran">Panduan Pembayaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/keranjang/{{ Auth::user()->email }}"><i
                                        class="fas fa-shopping-cart"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/biodata/{{ Auth::user()->email }}">
                                        Profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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


        @yield('content')

        <footer class="page-footer bg-secondary text-white pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4>ABOUT US</h4>
                        <hr>
                        <table>
                            <tr>
                                <th colspan="2">
                                    Kelompok 9
                                </th>
                            </tr>
                            <tr>
                                <td>Fauzan Harada</td>
                                <td>:</td>
                                <td>1710131310013</td>
                            </tr>
                            <tr>
                                <td>Muhammad Ramadani</td>
                                <td>:</td>
                                <td>1710131210011</td>
                            </tr>
                            <tr>
                                <td>Renaldi Al Amin</td>
                                <td>:</td>
                                <td>1710131310037</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                        <h4>CONTACT US</h4>
                        <hr>
                        <i class="fas fa-phone mr-2"></i> 081250829960
                        <br>
                        <i class="fas fa-home mr-2"></i> Banjarmasin, Kalimantan Selatan
                        <br>
                        <i class="fas fa-envelope mr-2"></i> bandarmasin_plant@gmail.com
                        {{-- <br> --}}
                        {{-- <a class="text-white" href=""><i class="fab fa-facebook mr-2"></i> Plant Shop BJM</a> --}}
                        <br>
                        <a class="text-white" href="https://www.instagram.com/bandarmasihplant/" target="_blank"><i class="fab fa-instagram mr-2"></i>@bandarmasihplant</a>


                    </div>
                </div>

            </div>
            <div class="bg-dark">
                <div class="container">
                    <div class="row py-2 d-flex align-items-center">
                        <div class="col-md-12 text-center">
                            &copy; Banjarmasin | 2020
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>



    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://kit.fontawesome.com/1e7c4af801.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>

    @stack('script')

</body>

</html>
