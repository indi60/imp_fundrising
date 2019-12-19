@include('partial.header')
		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element force-full-screen full-screen dark clearfix">
			
			<div class="force-full-screen full-screen">
				<div class="fslider" data-speed="3000" data-pause="7500" data-animation="fade" data-arrows="false" data-pagi="false" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background-color: #333; z-index: 1;">
					<div class="flexslider" style="height: 100% !important;">
						<div class="slider-wrap" style="height: inherit;">
							<div class="slide" style="background: url({{ URL::asset('asset/demos/real-estate/images/hero/3.jpg')}}) center center; background-size: cover; height: 100% !important;"></div>
							<div class="slide" style="background: url({{ URL::asset('asset/demos/real-estate/images/hero/4.jpg')}}) center center; background-size: cover; height: 100% !important;"></div>
							<div class="slide" style="background: url({{ URL::asset('asset/demos/real-estate/images/hero/5.jpg')}}) center center; background-size: cover; height: 100% !important;"></div>
						</div>
					</div>
				</div>
				<div class="vertical-middle" style="z-index: 3;">
					<div class="container center clearfix">
						<div class="emphasis-title nomargin">
							<h1>CrowdFunding</h1>
							<span class="t300 uppercase" style="font-size: 18px; letter-spacing: 10px; color: rgba(255,255,255,0.9);">A Few Clicks Away.</span>
						</div>
					</div>
				</div>
				<div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%; z-index:1;">
					<div class="video-overlay real-estate-video-overlay" style="z-index: 1;"></div>
				</div>
			</div>
			
		</section><!-- #slider end -->
		<div class="tabs advanced-real-estate-tabs clearfix">
			
			<div class="container clearfix">
				<ul class="tab-nav clearfix">
					<li><a href="#tab-properties" data-scrollto="#tab-properties" data-offset="133">Search Properties</a></li>
				</ul>
			</div>
			
			<div class="tab-container">
				<div class="container clearfix">
					<div class="tab-content clearfix" id="tab-properties">
						<form action="#" method="post" class="nobottommargin">
							<div class="row">
								<div class="col-lg-2 col-md-12 bottommargin-sm">
									<label for="" style="display:block;">Type</label>
									<input class="bt-switch" type="checkbox" checked data-on-text="Buy" data-off-text="Rent" data-on-color="themecolor" data-off-color="themecolor">
								</div>
								<div class="col-lg-3 col-md-6 col-12 bottommargin-sm">
									<label for="">Choose Locations</label>
									<select class="selectpicker form-control" multiple data-live-search="true" data-size="6" style="width:100%;">
										<optgroup label="Alaskan/Hawaiian Time Zone">
											<option value="AK">Alaska</option>
											<option value="HI">Hawaii</option>
										</optgroup>
										<optgroup label="Pacific Time Zone">
											<option value="CA">California</option>
											<option value="NV">Nevada</option>
											<option value="OR">Oregon</option>
											<option value="WA">Washington</option>
										</optgroup>
										<optgroup label="Mountain Time Zone">
											<option value="AZ">Arizona</option>
											<option value="CO">Colorado</option>
											<option value="ID">Idaho</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NM">New Mexico</option>
											<option value="ND">North Dakota</option>
											<option value="UT">Utah</option>
											<option value="WY">Wyoming</option>
										</optgroup>
										<optgroup label="Central Time Zone">
											<option value="AL">Alabama</option>
											<option value="AR">Arkansas</option>
											<option value="IL">Illinois</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="OK">Oklahoma</option>
											<option value="SD">South Dakota</option>
											<option value="TX">Texas</option>
											<option value="TN">Tennessee</option>
											<option value="WI">Wisconsin</option>
										</optgroup>
										<optgroup label="Eastern Time Zone">
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="IN">Indiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="OH">Ohio</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WV">West Virginia</option>
										</optgroup>
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-12 bottommargin-sm">
									<label for="">Property Type</label>
									<select class="selectpicker form-control" data-size="6" style="width:100%; line-height: 30px;">
										<option value="Any">Any</option>
										<optgroup label="Residential">
											<option value="Apartment">Apartment</option>
											<option value="Condo">Condo</option>
											<option value="Villa">Villa</option>
											<option value="Building">Building</option>
										</optgroup>
										<optgroup label="Commercial">
											<option value="Shop">Shop</option>
											<option value="Office">Office</option>
											<option value="Warehouse">Warehouse</option>
										</optgroup>
									</select>
								</div>
								<div class="col-lg-2 col-md-6 col-6 bottommargin-sm">
									<label for="">Beds</label>
									<select class="selectpicker form-control" multiple data-size="6" data-placeholder="Any" style="width:100%; line-height: 30px;">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5+">5+</option>
									</select>
								</div>
								<div class="col-lg-2 col-md-6 col-6 bottommargin-sm">
									<label for="">Baths</label>
									<select class="selectpicker form-control" multiple data-size="6" data-placeholder="Any" style="width:100%; line-height: 30px;">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5+">5+</option>
									</select>
								</div>
								<div class="w-100"></div>
								<div class="col-lg-4 col-md-6 col-12">
									<label for="" style="margin-bottom: 20px !important;">Price Range</label>
									<input class="price-range-slider" />
								</div>
								<div class="w-100 d-block d-md-none bottommargin-sm"></div>
								<div class="col-lg-4 offset-lg-1 col-md-6 col-12">
									<label for="" style="margin-bottom: 20px !important;">Property Area</label>
									<input class="area-range-slider" />
								</div>
								<div class="offset-lg-1 col-lg-2 col-md-12 clearfix">
									<button class="button button-3d button-rounded btn-block nomargin" style="margin-top: 35px !important;">Search</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		<div class="container">
		<section id="content">
			
			<div class="content-wrap">
				@yield('content')
			</div>

		</section><!-- #content end -->
	</div>
		<!-- Content
		============================================= -->
@include('partial.footer')
		