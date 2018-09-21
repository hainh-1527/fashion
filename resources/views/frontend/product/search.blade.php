@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
                <li>{{ __('product') }}</li>
                <li class="active">{{ __('search') }}</li>
            </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">
                    <div class="sidebar-filter margin-bottom-25">
                        <h2>Filter</h2>
                        <h3>Availability</h3>
                        <div class="checkbox-list">
                            <label><input type="checkbox"> Not Available (3)</label>
                            <label><input type="checkbox"> In Stock (26)</label>
                        </div>
                    </div>
                    @include('frontend.layouts.sidebar-categories')
                    @include('frontend.layouts.sidebar-featured-products')
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
                    <div class="content-search margin-bottom-20">
                        <div class="row">
                            <div class="col-md-12">

                                {!! Form::open(['route' => 'frontend.product.search', 'method' => 'GET']) !!}

                                <div class="input-group">

                                    {!! Form::text('q', isset($_GET['q']) ? $_GET['q'] : null, ['class' => 'form-control', 'placeholder' => __('search') . ' ...']) !!}

                                    <span class="input-group-btn">

                                        {!! Form::button(__('search'), ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

                                    </span>
                                </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
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
                            {{ $products->links('frontend.product.paging') }}
                        </div>
                    </div>
                    <!-- END PAGINATOR -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
    <div class="hide data-ajax" data-url="{{ route('frontend.cart.add') }}" data-title="{{ __('success') }}" data-message="{{ __('add_to_cart_success') }}"></div>
@stop
