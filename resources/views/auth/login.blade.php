<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Login - SISFO Perpustkaan
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ url('assets/css/soft-design-system.css?v=1.0.5') }}" rel="stylesheet" />
</head>

<body class="sign-in-illustration">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder">Login Anggota Perpustakaan</h4>
                                <p class="mb-0">Masukkan email dan password untuk masuk </p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-1 text-sm mx-auto d-lg-none">
                                    Belum punya akun?
                                    <a href="{{ route('register') }}"
                                        class="text-primary text-gradient font-weight-bold">Daftar</a>
                                </p>
                                <p class="mb-4 text-sm mx-auto">
                                    Lupa kata sandi?
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}"
                                            class="text-primary text-gradient font-weight-bold"> Klik
                                            disini untuk reset.</a>
                                    @endif

                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div
                            class="position-relative bg-gradient-secondary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                            <img src="../assets/img/shapes/pattern-lines.svg" alt="pattern-lines"
                                class="position-absolute opacity-4 start-0">
                            <div class="position-relative">
                                <img class="max-width-500 w-100 position-relative z-index-2"
                                    src="../assets/img/illustrations/chat.png">
                            </div>
                            <h4 class="mt-5 text-white font-weight-bolder">"Belum punya akun?"</h4>
                            <p class="text-white">Daftarkan diri kamu di SISFO Perpustakaan, unlock berbagai
                                buku-buku yang menarik untuk kamu baca, gratis!</p>
                            <a href="{{ route('register') }}"
                                class="btn bg-gradient-danger text-primary text-gradient">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ url('assets/js/soft-design-system.min.js?v=1.0.5') }}" type="text/javascript"></script>
</body>

</html>
