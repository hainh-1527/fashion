<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
    <meta charset="utf-8">
    <title>Fashion</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Project Demo" name="description">
    <meta content="Fashion" name="keywords">
    <meta content="Hải Nguyễn Developer" name="author">

    <meta property="og:site_name" content="Fashion">
    <meta property="og:title" content="Fashion">
    <meta property="og:description" content="Project Demo">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <base href="{{ asset('/') }}">
    <link rel="shortcut icon" href="{{ asset('uploads/default/favicon.png') }}">

    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/plugins/slider-layer-slider/css/layerslider.css') }}" rel="stylesheet">
    <!-- Page level plugin styles END -->

    {{ Html::style('assets/global/plugins/rateit/src/rateit.css') }}
    {{ Html::style('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}

    <!-- Theme styles START -->
    <link href="{{ asset('assets/global/css/components.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/layout/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/pages/css/style-shop.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/frontend/pages/css/style-layer-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/layout/css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/layout/css/themes/red.css') }}" rel="stylesheet" id="style-color">
    <link href="{{ asset('assets/frontend/layout/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/app.css') }}" rel="stylesheet">
    <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">

<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>096 224 3315</span></li>
                    <!-- BEGIN LANGS -->
                    <li class="langs-block">
                        <a href="javascript:void(0);" class="current">English </a>
                        <div class="langs-block-others-wrapper">
                            <div class="langs-block-others">
                                <a href="javascript:void(0);">French</a>
                                <a href="javascript:void(0);">Germany</a>
                                <a href="javascript:void(0);">Turkish</a>
                            </div>
                        </div>
                    </li>
                    <!-- END LANGS -->
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    @guest
                        <li><a href="{{ route('login') }}">{{ __('login') }}</a></li>
                        <li><a href="{{ route('register') }}">{{ __('register') }}</a></li>
                    @else
                        <li><a href="{{ route('frontend.wish_list.index') }}">{{ __('wish_list') }}</a></li>
                        <li><a href="{{ route('frontend.user.my_order') }}">{{ __('my_orders') }}</a></li>
                        <li class="langs-block">
                            <a href="javascript:void(0);" class="current">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="langs-block-others-wrapper">
                                <div class="langs-block-others">
                                    <a href="{{ route('frontend.user.my_profile') }}">{{ __('my_account') }}</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                        {{ __('logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<!-- END TOP BAR -->

<!-- BEGIN HEADER -->
<div class="header">
    <div class="container">
        <a class="site-logo" href="{{ route('frontend.home.main') }}"><img src="{{ asset('uploads/default/logo.png') }}" alt="Metronic Shop UI"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
            <div class="top-cart-info">
                <a class="top-cart-info-count">
                    <span class="fashion-cart-count">{{ Cart::count() }}</span>
                    {{ __('product') }}
                </a>
                <a class="top-cart-info-value"><span class="fashion-cart-total">{{ Cart::subtotal(0) }}</span>đ</a>
            </div>
            <i class="fa fa-shopping-cart"></i>

            <div class="top-cart-content-wrapper">
                <div class="top-cart-content">
                    <ul class="scroller cart-pop">
                        @foreach(Cart::content() as $cart)
                            <li>
                                <a href="{{ route('frontend.product.show', $cart->options->slug) }}">

                                    {!! Html::image($cart->options->thumbnail, $cart->name) !!}

                                </a>
                                <span class="cart-content-count">x {{ $cart->qty }}</span>
                                <strong>
                                    <a href="{{ route('frontend.product.show', $cart->options->slug) }}">
                                        {{ $cart->name }}
                                    </a>
                                </strong>
                                <em>{{ number_format($cart->price) }}đ</em>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-right">
                        <a href="{{ route('frontend.cart.index') }}" class="btn btn-default">{{ __('cart') }}</a>
                        <a href="{{ route('frontend.cart.checkout') }}" class="btn btn-primary">{{ __('checkout') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
            <ul>
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>

                <li><a href="{{ route('frontend.page.about_us') }}">{{ __('about_us') }}</a></li>

                <li class="dropdown dropdown-megamenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">{{ __('product') }}</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="header-navigation-content">
                                <div class="row">
                                    @foreach($categoriesProduct as $parent)
                                        <div class="col-md-4 header-navigation-col">
                                            <h4><a class="a-fix" href="{{ route('frontend.category.product', $parent->get('slug')) }}">{{ $parent->get('name') }}</a></h4>
                                            <ul>
                                                @foreach($parent->get('children') as $children)
                                                    <li><a href="{{ route('frontend.category.product', $children->get('slug')) }}">{{ $children->get('name') }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown100 nav-catalogue">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">{{ __('hot') }}</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="header-navigation-content">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="product-item">
                                            <div class="pi-img-wrapper">
                                                <a href="shop-item.html"><img src="{{ asset('assets/frontend/pages/img/products/model4.jpg') }}" class="img-responsive" alt="Berry Lace Dress"></a>
                                            </div>
                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                            <div class="pi-price">$29.00</div>
                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="product-item">
                                            <div class="pi-img-wrapper">
                                                <a href="shop-item.html"><img src="{{ asset('assets/frontend/pages/img/products/model3.jpg') }}" class="img-responsive" alt="Berry Lace Dress"></a>
                                            </div>
                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                            <div class="pi-price">$29.00</div>
                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="product-item">
                                            <div class="pi-img-wrapper">
                                                <a href="shop-item.html"><img src="{{ asset('assets/frontend/pages/img/products/model7.jpg') }}" class="img-responsive" alt="Berry Lace Dress"></a>
                                            </div>
                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                            <div class="pi-price">$29.00</div>
                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="product-item">
                                            <div class="pi-img-wrapper">
                                                <a href="shop-item.html"><img src="{{ asset('assets/frontend/pages/img/products/model4.jpg') }}" class="img-responsive" alt="Berry Lace Dress"></a>
                                            </div>
                                            <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                            <div class="pi-price">$29.00</div>
                                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        {{ __('post') }}
                    </a>

                    <!-- BEGIN DROPDOWN MENU -->
                    <ul class="dropdown-menu">
                        @foreach($categoriesPost as $category)
                            <li class="dropdown-submenu">
                                <a href="{{ route('frontend.category.post', $category->get('slug')) }}">
                                    {{ $category->get('name') }}
                                    @if(count($category->get('children')))
                                        <i class="fa fa-angle-right"></i>
                                    @endif
                                </a>
                                @if(count($category->get('children')))
                                    @include('frontend.layouts.sub-menu')
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    <!-- END DROPDOWN MENU -->
                </li>

                <li><a href="{{ route('frontend.page.contact') }}">{{ __('contact') }}</a></li>

                <!-- BEGIN TOP SEARCH -->
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">

                        {!! Form::open(['route' => 'frontend.home.search', 'method' => 'GET', ]) !!}

                            <div class="input-group">

                                {!! Form::text('q', isset($_GET['q']) ? $_GET['q'] : null, ['class' => 'form-control', 'placeholder' => __('search') . ' ...']) !!}

                                <span class="input-group-btn">

                                    {!! Form::button(__('search'), ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

                                </span>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </li>
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->
