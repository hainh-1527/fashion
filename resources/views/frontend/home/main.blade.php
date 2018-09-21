@extends('frontend.layouts.master')

@section('content')
    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-35">
        <!-- LayerSlider start -->
        <div id="layerslider" style="width: 100%; height: 494px; margin: 0 auto;">
            @foreach($sliders as $slider)
                <div class="ls-slide" data-ls="offsetxin: right; slidedelay: 7000; transition2d: 24,25,27,28;">
                    <img src="{{ $slider->thumbnail }}" class="ls-bg" alt="{{ $slider->name }}">
                </div>
            @endforeach
        </div>
        <!-- LayerSlider end -->
    </div>
    <!-- END SLIDER -->

    <div class="main">
        <div class="container">
            <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SALE PRODUCT -->
                <div class="col-md-12 sale-product">
                    <h2>{{ __('featured_products') }}</h2>
                    <div class="owl-carousel owl-carousel5">
                        @foreach($featuredProducts as $product)
                            <div>
                                @include('frontend.layouts.sidebar-product-item')
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- END SALE PRODUCT -->
            </div>
            <!-- END SALE PRODUCT & NEW ARRIVALS -->

            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40 ">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-4">
                    @include('frontend.layouts.sidebar-categories')
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-8">
                    <h2>{{ __('sale_products') }}</h2>
                    <div class="owl-carousel owl-carousel3">
                        @foreach($saleProducts as $product)
                            <div>
                                @include('frontend.layouts.sidebar-product-item')
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

            <!-- BEGIN TWO PRODUCTS & PROMO -->
            <div class="row margin-bottom-35 ">
                <!-- BEGIN TWO PRODUCTS -->
                <div class="col-md-6 two-items-bottom-items">
                    <h2>{{ __('new_products') }}</h2>
                    <div class="owl-carousel owl-carousel2">
                        @foreach($newProducts as $product)
                            <div>
                                @include('frontend.layouts.sidebar-product-item')
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- END TWO PRODUCTS -->
                <!-- BEGIN PROMO -->
                <div class="col-md-6 shop-index-carousel">
                    <div class="content-slider">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ asset('assets/frontend/pages/img/index-sliders/slide1.jpg') }}" class="img-responsive" alt="Berry Lace Dress">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('assets/frontend/pages/img/index-sliders/slide2.jpg') }}" class="img-responsive" alt="Berry Lace Dress">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('assets/frontend/pages/img/index-sliders/slide3.jpg') }}" class="img-responsive" alt="Berry Lace Dress">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROMO -->
            </div>
            <!-- END TWO PRODUCTS & PROMO -->
        </div>
    </div>
    <div class="hide data-ajax" data-url="{{ route('frontend.cart.add') }}" data-title="{{ __('success') }}" data-message="{{ __('add_to_cart_success') }}"></div>
@stop
