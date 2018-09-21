<!-- BEGIN BRANDS -->
<div class="brands">
    <div class="container">
        <div class="owl-carousel owl-carousel6-brands">
            @foreach($brands as $brand)
                <a href="{{ route('frontend.brand.products', $brand->slug) }}">

                    {!! Html::image(
                        $brand->thumbnail,
                        $brand->name,
                        ['title' => $brand->name]
                    ) !!}

                </a>
            @endforeach
        </div>
    </div>
</div>
<!-- END BRANDS -->

<!-- BEGIN STEPS -->
<div class="steps-block steps-block-red">
    <div class="container">
        <div class="row">
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-truck"></i>
                <div>
                    <h2>Free shipping</h2>
                    <em>Express delivery withing 3 days</em>
                </div>
                <span>&nbsp;</span>
            </div>
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-gift"></i>
                <div>
                    <h2>Daily Gifts</h2>
                    <em>3 Gifts daily for lucky customers</em>
                </div>
                <span>&nbsp;</span>
            </div>
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-phone"></i>
                <div>
                    <h2>477 505 8877</h2>
                    <em>24/7 customer care available</em>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END STEPS -->

<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>{{ __('about_us') }}</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip commodo consequat. </p>
                <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->
            <!-- BEGIN BOTTOM INFO BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>{{ __('category_product') }}</h2>
                <ul class="list-unstyled">
                    @foreach($categoriesProduct as $parent)
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a href="{{ route('frontend.category.product', $parent->get('slug')) }}">
                                {{ $parent->get('name') }}
                            </a>
                            <ul class="list-unstyled">
                                @foreach($parent->get('children') as $children)
                                    <li>
                                        <i class="fa fa-angle-right"></i>
                                        <a href="{{ route('frontend.category.product', $children->get('slug')) }}">
                                            {{ $children->get('name') }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- END INFO BLOCK -->

            <!-- BEGIN TWITTER BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>{{ __('category_post') }}</h2>
                <ul class="list-unstyled">
                    @foreach($categoriesPost as $category)
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a href="{{ route('frontend.category.post', $category->get('slug')) }}">
                                {{ $category->get('name') }}
                            </a>
                            @include('frontend.layouts.footer-category-post')
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- END TWITTER BLOCK -->

            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>{{ __('contact') }}</h2>
                <address class="margin-bottom-40">
                    35, Lorem Lis Street, Park Ave<br>
                    California, US<br>
                    Phone: 300 323 3456<br>
                    Fax: 300 323 1456<br>
                    Email: <a href="mailto:info@metronic.com">info@metronic.com</a><br>
                    Skype: <a href="skype:metronic">metronic</a>
                </address>
            </div>
            <!-- END BOTTOM CONTACTS -->
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-6 col-sm-6 padding-top-10">
                2018 © Fashion
            </div>
            <!-- END COPYRIGHT -->
            <!-- BEGIN PAYMENTS -->
            <div class="col-md-6 col-sm-6">
                <ul class="list-unstyled list-inline pull-right">
                    <li><img src="{{ asset('assets/frontend/layout/img/payments/western-union.jpg') }}" alt="We accept Western Union" title="We accept Western Union"></li>
                    <li><img src="{{ asset('assets/frontend/layout/img/payments/american-express.jpg') }}" alt="We accept American Express" title="We accept American Express"></li>
                    <li><img src="{{ asset('assets/frontend/layout/img/payments/MasterCard.jpg') }}" alt="We accept MasterCard" title="We accept MasterCard"></li>
                    <li><img src="{{ asset('assets/frontend/layout/img/payments/PayPal.jpg') }}" alt="We accept PayPal" title="We accept PayPal"></li>
                    <li><img src="{{ asset('assets/frontend/layout/img/payments/visa.jpg') }}" alt="We accept Visa" title="We accept Visa"></li>
                </ul>
            </div>
            <!-- END PAYMENTS -->
        </div>
    </div>
</div>
<!-- END FOOTER -->

<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="{{ asset('assets/global/plugins/respond.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/frontend/layout/scripts/back-to-top.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script><!-- pop up -->
<script src="{{ asset('assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script><!-- slider for products -->
<script src='{{ asset('assets/global/plugins/zoom/jquery.zoom.min.js') }}' type="text/javascript"></script><!-- product zoom -->
<script src="{{ asset('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript"></script><!-- Quantity -->

<!-- BEGIN LayerSlider -->
<script src="{{ asset('assets/global/plugins/slider-layer-slider/js/greensock.js') }}" type="text/javascript"></script><!-- External libraries: GreenSock -->
<script src="{{ asset('assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js') }}" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="{{ asset('assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js') }}" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="{{ asset('assets/frontend/pages/scripts/layerslider-init.js') }}" type="text/javascript"></script>
<!-- END LayerSlider -->

<script src="{{ asset('assets/frontend/layout/scripts/layout.js') }}" type="text/javascript"></script>

{{ Html::script('assets/global/plugins/rateit/src/jquery.rateit.js') }}
{{ Html::script('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}

<script src="{{ asset('assets/frontend/app.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        Layout.init();
        Layout.initOWL();
        LayersliderInit.initLayerSlider();
        Layout.initImageZoom();
        Layout.initTouchspin();
        Layout.initTwitter();

        Layout.initFixHeaderWithPreHeader();
        Layout.initNavScrolling();
    });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
