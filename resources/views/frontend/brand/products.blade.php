@extends('frontend.layouts.master')

@section('content')
    <div class="title-wrapper">
        <div class="container">
            <div class="container-inner">
                <h1><span>{{ $brand->name }}</span></h1>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
                <li>{{ __('brand') }}</li>
                <li class="active">{{ $brand->name }}</li>
            </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">
                    @include('frontend.layouts.sidebar-categories')
                    <div class="sidebar-filter margin-bottom-25">
                        <h2>Filter</h2>
                        <h3>Availability</h3>
                        <div class="checkbox-list">
                            <label><input type="checkbox"> Not Available (3)</label>
                            <label><input type="checkbox"> In Stock (26)</label>
                        </div>

                        <h3>Price</h3>
                        <p>
                            <label for="amount">Range:</label>
                            <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
                        </p>
                        <div id="slider-range"></div>
                    </div>
                    @include('frontend.layouts.sidebar-featured-products')
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
                    <!-- BEGIN PRODUCT LIST -->
                    <div class="row product-list">
                        @foreach($products as $product)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                @include('frontend.layouts.sidebar-product-item')
                            </div>
                        @endforeach
                    </div>
                    <!-- END PRODUCT LIST -->
                    <!-- BEGIN PAGINATOR -->
                    <div class="row">
                        <div class="col-md-offset-4 col-md-8 col-sm-8">
                            {{ $products->links('frontend.category.paging-product') }}
                        </div>
                    </div>
                    <!-- END PAGINATOR -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@stop
