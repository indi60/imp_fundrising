<!-- Footer
		============================================= -->
<footer id="footer" class="dark">

    <div class="container">

        <!-- Footer Widgets
				============================================= -->
        <div class="footer-widgets-wrap clearfix">
            <div class="col_two_fifth">

                <div class="widget clearfix">

                    <img src="{{asset('asset/demos/real-estate/images/idelight.png')}}"
                        style="position: relative; opacity: 0.85; left: -10px; max-height: 80px; margin-bottom: 20px;"
                        alt="Footer Logo">

                    <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong>
                        Design Standards with a Retina &amp; Responsive Approach. Browse the amazing Features this
                        template offers.</p>

                    <div class="line" style="margin: 30px 0;"></div>

                    <p class="ls1 t300" style="opacity: 0.6; font-size: 13px;">Copyrights &copy; 2020 IDE BABE</p>

                </div>

            </div>

            <div class="col_three_fifth col_last">
                <div class="col_half col_last">

                    <h4 class="ls1 t400 uppercase">Connect Socially</h4>

                    <div class="bottommargin-sm clearfix">
                        <a href="#" class="social-icon si-colored si-small si-rounded si-facebook" title="Facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-colored si-small si-rounded si-twitter" title="Twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-colored si-small si-rounded si-instagram" title="Instagram">
                            <i class="icon-instagram"></i>
                            <i class="icon-instagram"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div><!-- .footer-widgets-wrap end -->

    </div>

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

<!-- Google Map JavaScripts
	============================================= -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAO2BYvn4xyrdisvP8feA4AS_PGZFxJDp4"></script>
<script src="{{asset('asset/jss/jquery.gmap.js')}}"></script>

<!-- Bootstrap Select Plugin -->
<script src="{{asset('asset/jss/components/bs-select.js')}}"></script>

<!-- Bootstrap Switch Plugin -->
<script src="{{asset('asset/jss/components/bs-switches.js')}}"></script>

<!-- Range Slider Plugin -->
<script src="{{asset('asset/jss/components/rangeslider.min.js')}}"></script>

<!-- Footer Scripts
	============================================= -->
<script src="{{asset('asset/jss/functions.js')}}"></script>

<script>
    jQuery(document).ready(function () {

        $(".price-range-slider").ionRangeSlider({
            type: "double",
            prefix: "$",
            min: 200,
            max: 10000,
            max_postfix: "+"
        });

        $(".area-range-slider").ionRangeSlider({
            type: "double",
            min: 50,
            max: 20000,
            from: 50,
            to: 20000,
            postfix: " sqm.",
            max_postfix: "+"
        });

        jQuery(".bt-switch").bootstrapSwitch();

    });

    jQuery(window).on('load', function () {

        // Google Map
        jQuery('#headquarters-map').gMap({
            address: 'New York, USA',
            maptype: 'ROADMAP',
            zoom: 13,
            markers: [{
                address: "New York, USA",
                html: "New York, USA",
                icon: {
                    image: "{{asset('asset/images/icons/map-icon-red.png')}}",
                    iconsize: [32, 36],
                    iconanchor: [14, 44]
                }
            }],
            doubleclickzoom: false,
            controls: {
                panControl: false,
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                overviewMapControl: false
            },
            styles: [{
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#444444"
                }]
            }, {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [{
                    "color": "#f2f2f2"
                }]
            }, {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road",
                "elementType": "all",
                "stylers": [{
                    "color": "#F0AD4E"
                }, {
                    "lightness": 60
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [{
                    "visibility": "simplified"
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                    "color": "#2C3E50"
                }, {
                    "visibility": "on"
                }]
            }]
        });

    });

</script>
{{-- DataTabel --}}
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script> 
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
@yield('scripts')

{{-- <script src="tail.select-full.min.js"></script> --}}
{{-- AJAX --}}
<script src="{{ asset('assets/validator/validator.min.js') }}"></script>
{{-- TUTUP AJAX --}}


</body>

</html>
