<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Roboto:300,400,500,700|Rubik:400,600"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="{{asset('asset/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('asset/css/dark.css')}}" type="text/css" />

    <!-- Real Estate Demo Specific Stylesheet -->
    <link rel="stylesheet" href="{{asset('asset/demos/real-estate/real-estate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('asset/demos/real-estate/css/font-icons.css')}}" type="text/css" />
    <!-- / -->

    <link rel="stylesheet" href="{{asset('asset/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('asset/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('asset/css/magnific-popup.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('asset/demos/real-estate/fonts.css')}}" type="text/css" />

    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="{{asset('asset/csss/components/bs-select.css')}}" type="text/css" />

    <!-- Bootstrap Switch CSS -->
    <link rel="stylesheet" href="{{asset('asset/csss/components/bs-switches.css')}}" type="text/css" />

    <!-- Range Slider CSS -->
    <link rel="stylesheet" href="{{asset('asset/csss/components/ion.rangeslider.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- nice select --}}
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}" type="text/css" />
    {{-- AJAX --}}
    <script src="{{asset('assets/sweetalert2/sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/sweetalert2/sweetalert2.min.css')}}">
    {{-- TUTUP AJAX --}}

    {{-- DatePicker --}}
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    {{-- DataTable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Document Title
	============================================= -->
    <title>@yield('title', '
    ')</title>
    <link rel="shortcut icon" href="{{asset('asset/demos/real-estate/images/idelight.png')}}">

</head>

<body class="stretched side-push-panel" style="font-family: 'Poppins', sans-serif;">

    <div id="side-panel" style="background: #2193b0;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">

        <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a>
        </div>

        <div class="side-panel-wrap" style="margin-bottom:200px;">

            <div class="widget clearfix">
                <h4 class="t400"> <h3 class="text-center text-light" style="font-family:sans-serif;"> Login </h3>
                <hr><br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" 
                            class="col-md-4 col-form-label text-md-right"> <h5 class="text-light"> E-Mail Address </h5></label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right text-light"> <h5 class="text-light">Password </h5></label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-sm">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-danger btn-sm">{{ __('Register') }}</a>
                            @endif <br>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link text-light" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>


            </div>

        </div>

    </div>

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">
        <!-- Header
		============================================= -->
        <header id="header" class="static-sticky transparent-header dark">

            <div id="header-wrap" style="background-color: rgb(25, 41, 58);">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
					============================================= -->
                    <div id="logo">
						<a href="#" class="standard-logo" data-dark-logo="{{asset('asset/demos/real-estate/images/idelight.png')}}"> <img src="{{asset('asset/demos/real-estate/images/logo@2x.png')}}" alt="Canvas Logo"></a>
					</div>
           
                    <!-- Primary Navigation
					============================================= -->
                    <nav id="primary-menu" class="with-arrows">

                        @if (Auth::check() && Auth::User()->level == 2)
                        <ul>
                            <li class=""><a href="/">
                                    <div style="font-size:15px;">Home</div>
                                </a></li>
                            <li class=""><a href="#">
                                    <div style="font-size:15px">List Project</div>
                                </a></li>
                            <li><a href="/admin/list_donatur/">
                                    <div style="font-size:15px">List Donatur</div>
                                </a></li>
                            <li><a href="/admin/list_owner_project">
                                    <div style="font-size:15px">List Fundraiser</div>
                                </a></li>
                            <li><a href="#">
                                    <div style="font-size:15px">Referensi</div>
                                </a>
                                <ul>
                                    <li><a href="/admin/kategoriproject">
                                            <div>Kategori Project</div>
                                        </a></li>
                                    <li><a href="/admin/refbank">
                                            <div>Bank</div>
                                        </a></li>
                                    <li><a href="/admin/provinsi">
                                            <div>Provinsi</div>
                                        </a></li>
                                    <li><a href="/admin/kabupaten">
                                            <div>Kabupaten</div>
                                        </a></li>
                                    <li><a href="/admin/kecamatan">
                                            <div>Kecamatan</div>
                                        </a></li>
                                    <li><a href="/admin/kelurahan">
                                            <div>Kelurahan</div>
                                        </a></li>
                                </ul>
                            </li>

                        </ul>
                        @endif

                        @if (Auth::check() && Auth::User()->level == 3)
                        <ul>
                            <li class=""><a href="/">
                                    <div style="font-size:15px">Home</div>
                                </a></li>
                            <li class=""><a href="/powner/create_project">
                                    <div style="font-size:15px">Create Project</div>
                                </a></li>
                            <li><a href="#">
                                    <div style="font-size:15px">Laporan Project</div>
                                </a></li>

                        </ul>
                        @endif

                        @if (Auth::check() && Auth::User()->level == 1)
                        <ul>
                            <li class=""><a href="/">
                                    <div style="font-size:15px">Home</div>
                                </a></li>
                            <li class=""><a href="/donatur/lihat_project">
                                    <div style="font-size:15px">Lihat Project</div>
                                </a></li>
                            <li><a href="/donatur/donasi_project">
                                    <div style="font-size:15px">Donasi Project</div>
                                </a></li>

                        </ul>
                        @endif
                        @guest
                        <ul>
                            <li><a href="#" class="side-panel-trigger" style="font-size:15px">Login |
                                    Register</a></li>
                        </ul>
                        @else
                        <ul>
                            <li><a href="#">
                                    <div style="font-size:15px">{{ Auth::user()->name }}</div>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"> logout </a>
                                    </li>

                                </ul>
                            </li>

                            @endguest
                        </ul>
                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->
