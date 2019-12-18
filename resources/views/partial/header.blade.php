<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Roboto:300,400,500,700|Rubik:400,600"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}" type="text/css" />
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

    <link rel="stylesheet" href="{{asset('asset/css/colors.php?color=2C3E50')}}" type="text/css" />
    {{-- DataTable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- Document Title
	============================================= -->
    <title>@yield('title', 'Home')</title>

</head>

<body class="stretched side-push-panel">

    <div id="side-panel">

        <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a>
        </div>

        <div class="side-panel-wrap" style="margin-bottom:200px;">

            <div class="widget clearfix">


                <h4 class="t400 text-center">Login</h4><br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('register'))
                            <a class="nav-link btn btn-danger" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
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

        <!-- Top Bar
		============================================= -->
        <div id="top-bar" class="transparent-topbar">

            <div class="container clearfix">
                <div class="col_half fright col_last clearfix nobottommargin">
                    <!-- Top Links
					============================================= -->

                    <div class="top-links">
                        @guest
                        <ul>
                            <li><a href="#" class="side-panel-trigger">Login | Register</a></li>
                        </ul>
                        @else
                        <ul>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="drowdownMenuButton">
                                    <a class="dropdown-item text-info" style="margin-left:20px;" href="#">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" style="margin-left:20px;"
                                        href="{{ route('logout') }}" onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div><!-- .top-links end -->

                </div>

            </div>

        </div><!-- #top-bar end -->

        <!-- Header
		============================================= -->
        <header id="header" class="static-sticky transparent-header dark">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
					============================================= -->
                    <div id="logo">
                        <a href="index.html" data-dark-logo="{{asset('asset/demos/real-estate/images/logo.png')}}"
                            class="standard-logo"><img src="{{asset('asset/demos/real-estate/images/logo.png')}}"
                                alt="Canvas Logo"></a>
                        <a href="index.html" data-dark-logo="{{asset('asset/demos/real-estate/images/logo@2x.png')}}"
                            class="retina-logo"><img src="{{asset('asset/demos/real-estate/images/logo@2x.png')}}"
                                alt="Canvas Logo"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
					============================================= -->
                    <nav id="primary-menu" class="with-arrows">
                        @if (Auth::check() && Auth::User()->level == 2)
                        <ul>
                            <li class="current"><a href="#">
                                    <div>List Project</div>
                                </a></li>
                            <li><a href="#">
                                    <div>List Donatur</div>
                                </a></li>
                            <li><a href="#">
                                    <div>List Owner Project</div>
                                </a></li>
                            <li><a href="#">
                                    <div>Referensi</div>
                                </a>
                                <ul>
                                    <li><a href="#">
                                            <div>Kategori Project</div>
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
                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->
