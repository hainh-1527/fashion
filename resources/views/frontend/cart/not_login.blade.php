@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
                <li class="active">{{ __('checkout') }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>{{ __('checkout') }}</h1>
                    <!-- BEGIN CHECKOUT PAGE -->
                    <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

                        <!-- BEGIN CHECKOUT -->
                        <div id="checkout" class="panel panel-default">
                            <div id="checkout-content" class="panel-collapse collapse in">
                                <div class="panel-body row">
                                    <div class="col-md-12">
                                        <p>{{ __('please') }} <a href="{{ route('login') }}">{{ __('login') }}</a> {{ __('to_make_payment') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END CONFIRM -->
                    </div>
                    <!-- END CHECKOUT PAGE -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@stop
