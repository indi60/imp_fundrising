<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
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
						<a href="#" class="standard-logo" data-dark-logo="{{asset('asset/demos/real-estate/images/idedark.png')}}"><img src="{{asset('asset/demos/real-estate/images/idedark.png')}}" alt="Canvas Logo"></a>
					</div><!-- #logo end -->
				</div>
			</div>
		</header><!-- #header end -->
		<!-- Content
		============================================= -->
        <section id="content" style="background: #2193b0;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register"
                        style="max-width: 500px;">

                        <div class="tab-container">
                            <h3 class="text-center">
								<strong> Buat Akun IDE BABE </strong>
							</h3>

                            <div class="tab-content clearfix" id="tab-login">
                                <div class="card nobottommargin">
                                    <div class="card-body" style="padding: 40px;">
                                        {{-- <h3>Register</h3> --}}
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <h3 for="nik"
                                                    class="col-form-label text-md-left">Sebagai</h3>

                                                <div class="">
                                                    <select name="level" class="form-control custom-select" id="level" required>
														<option value="" disabled selected>Pilih</option>
														<option value="1">DONATUR</option>
														<option value="3">PENGGALANG DANA</option>
													</select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nik"
                                                    class="col-form-label text-md-left">Nik</label>

                                                <div class="">
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
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="name"
                                                    class="col-form-label text-md-left">{{ __('Name') }}</label>

                                                <div class="">
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
											
											<div class="form-group col-md-6">
                                                <label for="email"
                                                    class="col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                                <div class="">
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
                                        </div>
											<div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="jenis_kelamin"
													class="col-form-label text-md-left">Jenis Kelamin</label>
													
													
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input" id="customRadio1" name="jenis_kelamin" checked value="L">
															<label class="custom-control-label" for="customRadio1">Laki-Laki</label>
														</div>
															<br>

															<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input" id="customRadio2" name="jenis_kelamin" value="P">
															<label class="custom-control-label" for="customRadio2">Perempuan</label>
															</div>
														 <br> 
												
                                                    @error('jenis_kelamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
													@enderror
												
											</div>
											
                                            <div class="form-group col-md-6">
                                                <label for="tanggal_lahir"
                                                    class="col-form-label text-md-left">Tanggal Lahir</label>

                                                <div class="">
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
                                        </div>

											<div class="form-group row">
                                                <label for="alamat"
                                                    class="col-form-label text-md-right" style="margin-left:170px;">Alamat</label>
                                                <div class="col-md-6">
                                                    <textarea id="alamat" type="text" style="margin-left:95px;"
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
                                            
                                            <div class="form-row">
											<div class="form-group col-md-6">
                                                <label for="provinsi_id"
                                                    class="col-form-label text-md-right">Provinsi</label>
												<div class="">
													<select id="provinsi_id" name="provinsi_id" class="col-md-12 form-control custom-select" required>
														<option value="" selected disabled>PILIH PROVINSI</option>
														@foreach ($provinsi as $key=>$prov)
														<option value="{{$key}}" @if (!empty($data) && $data->provinsi_id==$key) selected @endif>{{$prov}}
														</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group col-md-6">
                                                <label for="kabupaten_id"
												class="col-form-label text-md-right">Kabupaten</label>
												<div class="">
													<select id="kabupaten_id" name="kabupaten_id" class="col-md-12 form-control custom-select" required></select>	
												</div>
                                            </div>
                                        </div>
                                        <div class="form-row">
											<div class="form-group col-md-6">
                                                <label for="kecamatan_id"
												class="col-form-label text-md-left">Kecamatan</label>
												<div class="">
													<select id="kecamatan_id" name="kecamatan_id" class="col-md-12 form-control custom-select" required></select>	
												</div>
											</div>
											<div class="form-group col-md-6">
                                                <label for="kelurahan_id"
												class="col-form-label text-md-left">Kelurahan</label>
												<div class="">
													<select id="kelurahan_id" name="kelurahan_id" class="col-md-12 form-control custom-select" required></select>	
												</div>
											</div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="password"
                                                    class="col-form-label text-md-left">{{ __('Password') }}</label>

                                                <div class="">
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

                                            <div class="form-group col-md-6">
                                                <label for="password-confirm"
                                                    class="col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                                                <div class="">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>

                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-8 mt-2">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
													</button>
													<a href="/" class="btn btn-danger"> Back</a>
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
						Copyrights &copy; 2020 <br>
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

							<a href="#" class="social-icon si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
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
	<script src="{{asset('asset/jss/plugins.js')}}"></script>
	<!-- Footer Scripts
	============================================= -->
	<script src="{{asset('asset/jss/functions.js')}}"></script>
    <!-- Footer Scripts
	============================================= -->
	<script src="{{asset('asset/jss/functions.js')}}"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
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
		var msg = '{{Session::get('alert')}}';
		var exist = '{{Session::has('alert')}}';
		if(exist){
		alert(msg);
		}
		$(document).ready(function() {  
        $('select').select2({ width: '100%' });
    });
		</script>
		
</body>

</html>
