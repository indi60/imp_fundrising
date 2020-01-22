@extends('partial.main')
@section('title', 'Home')
@section('content')
		<!-- Slider
		 ============================================= -->
		<section id="slider" class="slider-element force-full-screen full-screen dark clearfix">
			<div class="force-full-screen full-screen">
					  <div class="logo">
						<img src="{{asset('asset/demos/real-estate/images/hero/3.jpg')}}" class="d-block w-100" alt="...">
					  </div>
				<div class="vertical-middle" style="z-index: 3;">
					<div class="container center clearfix">
						<div class="emphasis-title nomargin">
							<h1>IDE BABE</h1>
							<span class="t300 uppercase" style="font-size: 18px; letter-spacing: 10px; color: rgba(255,255,255,0.9);">INFAK DUIT EMAS & BARANG BEKAS</span>
						</div>
					</div>
				</div>
				<div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%; z-index:1;">
					<div class="video-overlay real-estate-video-overlay" style="z-index: 1;"></div>
				</div>
			</div>
        </section><!-- #slider end -->
        <div class="container">
            <div class="text" id="list">
                <h2  style="margin-top:20px">List Project</h2>
            </div>
            <div style="position: relative;">
						<div class="real-estate owl-carousel image-carousel carousel-widget bottommargin-lg" data-margin="10" data-nav="true" data-loop="false" data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="3" data-items-xl="3">
							@foreach ($mproject as $mpjek)
								
							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<h4 class="badge badge-danger badge-pill">Tanggal Ditutup : {{$mpjek->tanggal_ditutup}}</h4>
										
										<a href="{{$mpjek->id}}/show">
											<?php echo substr($mpjek->konten, 0, 300) ?>
										</a>
										<div class="real-estate-item-price">
											Target :
											Rp. <?php echo number_format($mpjek->target,0,'.','.') ?><span></span>
										</div>
									</div>
									<div class="real-estate-item-desc">
										<h3><a href="{{$mpjek->id}}/show">{{$mpjek->nama_project}}</a></h3>
										<span>{{$mpjek->kategori_project}}</span>

										<a href="{{$mpjek->id}}/show" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>
										
										<div class="real-estate-item-features t500 font-primary clearfix">
											<div class="row no-gutters">
												<div class="col-lg-4 nopadding">Terkumpul <span class="color">{{$mpjek->terkumpul}}</span></div>
											
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
        </div>
@endsection
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>