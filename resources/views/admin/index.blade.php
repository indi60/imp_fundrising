@extends('partial.main')
@section('title', auth()->user()->name.' | Home')
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
						<div class="real-estate owl-carousel image-carousel carousel-widget bottommargin-lg" data-margin="10" data-nav="true" data-loop="true" data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="3" data-items-xl="3">

							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge badge-danger bgcolor-2">For Sale</div>
										<a href="#">
											<img src="{{asset('asset/demos/real-estate/images/items/1.jpg')}}" alt="Image 1">
										</a>
										<div class="real-estate-item-price">
											$1.2m<span>Leasehold</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>
									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features t500 font-primary clearfix">
											<div class="row no-gutters">
												<div class="col-lg-4 nopadding">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 nopadding">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Cleaning: <span class="text-danger"><i class="icon-minus-sign-alt"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge badge-success">Hot Deal</div>
										<a href="#">
											<img src="{{asset('asset/demos/real-estate/images/items/2.jpg')}}" alt="Image 2">
										</a>
										<div class="real-estate-item-price">
											$200,000<span>bi-annually</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features t500 clearfix">
											<div class="row no-gutters">
												<div class="col-lg-4 nopadding">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 nopadding">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge badge-danger">Long Term Rental</div>
										<a href="#">
											<img src="{{asset('asset/demos/real-estate/images/items/4.jpg')}}" alt="Image 3">
										</a>
										<div class="real-estate-item-price">
											$1600<span>per month</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features t500 clearfix">
											<div class="row no-gutters">
												<div class="col-lg-4 nopadding">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 nopadding">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
        </div>
@endsection