<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>SISFO Perpustakaan </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-design-system.css') }}" rel="stylesheet" />
</head>

<body class="presentation-page">
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav
                    class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand font-weight-bolder ms-sm-3" href="{{ url('/') }}">
                            SISFO Perpustakaan
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                            <ul class="navbar-nav navbar-nav-hover ms-lg-12 ps-lg-5 w-100">
                                @guest
                                    <li class="nav-item ms-lg-auto">
                                        <a href="{{ route('login') }}"
                                            class="btn btn-sm  bg-gradient-primary  btn-round mb-0 me-2 mt-2 mt-md-0">Login</a>
                                    </li>
                                    <li class="nav-item my-auto ms-3 ms-lg-0">
                                        <a href="{{ route('register') }}"
                                            class="btn btn-sm  bg-outline-danger  btn-round mb-0 me-1 mt-2 mt-md-0">REGISTER</a>
                                    </li>
                                @else
                                    <li class="nav-item ms-lg-auto">
                                        <h5 class="text-dark mb-0 me-2 mt-2 mt-md-0">{{ Auth::user()->name }}</h5>
                                    </li>
                                    <li class="nav-item my-auto ms-3 ms-lg-0">
                                        <a class="btn btn-sm  bg-gradient-primary  btn-round" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <header class="header-2">
        <div class="page-header min-vh-50 relative" style="background-image: url('../assets/img/curved.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h3 class="text-white pt-3 mt-n5">SISTEM INFORMASI PERPUSTAKAAN</h3>
                        {{-- <p class="lead text-white mt-3">Free & Open Source Web UI Kit built over Bootstrap 5. <br /> Join over 1.4 million developers around the world. </p> --}}
                    </div>
                </div>
            </div>
            <div class="position-absolute w-100 z-index-1 bottom-0">
                <svg class="waves" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none"
                    shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave"
                            d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="moving-waves">
                        <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                        <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                        <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                        <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
                    </g>
                </svg>
            </div>
        </div>
    </header>

    <section class="pb-4">
        <div class="container">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header text-center pb-0 p-3">
                        <h4 class="mb-1">Semua Kategory Buku</h4>
                    </div>
                    <div class="mb-2 px-4 w-25">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Category </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body p-3 mx-auto">
                        <div class="row d-flex justify-content-center">
                            @foreach ($categories as $category)
                                <div class="col-xl-3 col-md-6 mb-xl-0 mt-4 mb-5">
                                    <div class="card card-blog card-plain">
                                        <div class="d-flex align-categorys-center justify-content-between">
                                            <a href="{{ route('category', $category->slug) }}"
                                                class="btn btn-outline-primary btn-sm mb-0">{{ $category->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
    <footer class="footer pt-5 mt-2">
        <hr class="horizontal dark mb-5">
        <div class="container">
            <div class=" row">
                <div class="col-12">
                    <div class="text-center">
                        <p class="my-4 text-sm">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>UI Design by<a href="https://www.creative-tim.com" target="_blank">Rams
                                Studio</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="{{ url('assets/js/plugins/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/plugins/toastr.min.js') }}" type="text/javascript"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('assets/js/soft-design-system.min.js') }}" type="text/javascript"></script>
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session('success') }}");
        </script>
    @endif
</body>

</html>
