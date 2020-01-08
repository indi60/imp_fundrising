<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('asset/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('asset/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('asset/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('asset/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('asset/css/magnific-popup.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
	============================================= -->
    <title>Register | Canvas</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
		============================================= -->
        <header id="header" class="full-header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
					============================================= -->
                    <div id="logo">
                        <a href="#" class="standard-logo"
                            data-dark-logo="{{asset('asset/demos/real-estate/images/logo@2x.png')}}"><img
                                src="{{asset('asset/demos/real-estate/images/logo@2x.png')}}" alt="Canvas Logo"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
					============================================= -->
                    <nav id="primary-menu">





                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->
        <!-- Content
		============================================= -->
        <section id="content">
            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register"
                        style="max-width: 500px;">

                        <div class="tab-container">

                            <div class="tab-content clearfix" id="tab-login">
                                <div class="card nobottommargin">
                                    <div class="card-body" style="padding: 40px;">
                                        {{-- <h3>Register</h3> --}}
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <h3 for="nik"
                                                    class="col-md-4 col-form-label text-md-right">Register</h3>

                                                <div class="col-md-6">
                                                    <select name="level" class="form-control" id="level" required>
														<option value="1">DONATUR</option>
														<option value="3">PROJECT OWNER</option>
													</select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nik"
                                                    class="col-md-4 col-form-label text-md-right">Nik</label>

                                                <div class="col-md-6">
                                                    <input id="nik" type="text"
                                                        class="form-control @error('nik') is-invalid @enderror"
                                                        name="nik" value="{{ old('nik') }}" required autocomplete="nik"
                                                        autofocus>

                                                    @error('nik')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
											</div>
											
											<div class="form-group row">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
											</div>
											
                                            <div class="form-group row">
                                                <label for="jenis_kelamin"
                                                    class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>

                                                	<div class="col-md-6">
													<label><input type="radio" name="jenis_kelamin" value="L" checked>Laki-Laki</label> <br>
                                                    <label><input type="radio" name="jenis_kelamin" value="P">Perempuan</label> <br> 
												
                                                    @error('jenis_kelamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
											</div>
											
                                            <div class="form-group row">
                                                <label for="tanggal_lahir"
                                                    class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>

                                                <div class="col-md-6">
                                                    <input id="tanggal_lahir" type="date"
                                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                                        autocomplete="tanggal_lahir" autofocus>

                                                    @error('tanggal_lahir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

											<div class="form-group row">
                                                <label for="alamat"
                                                    class="col-md-4 col-form-label text-md-right">Alamat</label>

                                                <div class="col-md-6">
                                                    <textarea id="alamat" type="text"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        name="alamat" value="{{ old('alamat') }}" required
                                                        autocomplete="alamat" autofocus></textarea>

                                                    @error('alamat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
											</div>
											
											<div class="form-group row">
                                                <label for="provinsi_id"
                                                    class="col-md-4 col-form-label text-md-right">Provinsi</label>
												<div class="col-md-6">
													<select id="provinsi_id" name="provinsi_id" class="col-md-12 form-control" required>
														<option value="" selected disabled>PILIH PROVINSI</option>
														@foreach ($provinsi as $key=>$prov)
														<option value="{{$key}}" @if (!empty($data) && $data->provinsi_id==$key) selected @endif>{{$prov}}
														</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group row">
                                                <label for="kabupaten_id"
												class="col-md-4 col-form-label text-md-right">Kabupaten</label>
												<div class="col-md-6">
													<select id="kabupaten_id" name="kabupaten_id" class="col-md-12 form-control" required></select>	
												</div>
											</div>
											<div class="form-group row">
                                                <label for="kecamatan_id"
												class="col-md-4 col-form-label text-md-right">Kecamatan</label>
												<div class="col-md-6">
													<select id="kecamatan_id" name="kecamatan_id" class="col-md-12 form-control" required></select>	
												</div>
											</div>
											<div class="form-group row">
                                                <label for="kelurahan_id"
												class="col-md-4 col-form-label text-md-right">Kelurahan</label>
												<div class="col-md-6">
													<select id="kelurahan_id" name="kelurahan_id" class="col-md-12 form-control" required></select>	
												</div>
											</div>
											

                                            <div class="form-group row">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            
    </section><!-- #content end -->

    <!-- Footer
		============================================= -->
    <footer id="footer" class="dark">
        <!-- Copyrights
			============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyrights &copy; 2019 <br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <div class="clear"></div>
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

    </div><!-- #wrapper end -->
	
    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
	============================================= -->
	<script src="{{asset('asset/js/jquery.js')}}"></script>
			
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
    <script src="{{asset('asset/jss/plugins.js')}}"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="{{asset('asset/jss/functions.js')}}"></script>
	<script type="text/javascript">
		$('#kabupaten_id').prop('disabled', true);
		$('#kecamatan_id').prop('disabled', true);
		$('#kelurahan_id').prop('disabled', true);
		$('#provinsi_id').change(function() {
		var provinsiID =$(this).val();
		if (provinsiID) {
			$.ajax({
				type:"GET",
				url:"{{url('get_kabupaten')}}?provinsi_id="+provinsiID,
				success:function(res){
					if (res) {
						$('#kabupaten_id').empty();
						$('#kabupaten_id').prop('disabled', false);
						$('#kabupaten_id').append('<option selected disabled>PILIH KABUPATEN</option>');
						$.each(res,function(key, value){
							$('#kabupaten_id').append('<option value="'+key+'">'+value+'</option>');
						});
					}else{
						$('#kabupaten_id').empty();
					}
				}
			});
		}else{
			$('#kabupaten_id').empty();
			$('#kecamatan_id').empty();
		}
		});
		$('#kabupaten_id').change(function() {
			var kabupatenID =$(this).val();
			if (kabupatenID) {
				$.ajax({
					type:"GET",
					url: "{{url('get_kecamatan')}}?kabupaten_id="+kabupatenID,
					success:function(res){
						if (res) {    
							$('#kecamatan_id').empty();
							$('#kecamatan_id').prop('disabled', false);
							$('#kecamatan_id').append('<option selected disabled>PILIH KECAMATAN</option');
							$.each(res,function(key, value){
								$('#kecamatan_id').append('<option value="'+key+'">'+value+'</option>');
							});
						}else{
							$('#kecamatan_id').empty();
						}
					}
				});
			}else{
				$('#kecamatan_id').empty();
			}
		});
		$('#kecamatan_id').change(function() {
			var kabupatenID =$(this).val();
			if (kabupatenID) {
				$.ajax({
					type:"GET",
					url: "{{url('get_kelurahan')}}?kecamatan_id="+kabupatenID,
					success:function(res){
						if (res) {    
							$('#kelurahan_id').empty();
							$('#kelurahan_id').prop('disabled', false);
							$('#kelurahan_id').append('<option selected disabled>PILIH KELURAHAN</option');
							$.each(res,function(key, value){
								$('#kelurahan_id').append('<option value="'+key+'">'+value+'</option>');
							});
						}else{
							$('#kelurahan_id').empty();
						}
					}
				});
			}else{
				$('#kelurahan_id').empty();
			}
		});
		$(document).ready(function() {  
        $('#provinsi_id').select2({ width: '100%' });
        $('#kabupaten_id').select2({ width: '100%' });
        $('#kecamatan_id').select2({ width: '100%' });
        $('#kelurahan_id').select2({ width: '100%' });
    });
		</script>
</body>

</html>
