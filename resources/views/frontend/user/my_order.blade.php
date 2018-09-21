@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
                <li class="active">{{ __('my_orders') }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">
                    @include('frontend.layouts.sidebar-categories')
                    @include('frontend.layouts.sidebar-featured-products')
                </div>
                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
                    <h1>{{ __('my_orders') }}</h1>
                    <div class="goods-page">
                        <div class="goods-data clearfix">
                            <div class="table-wrapper-responsive">
                                <table summary="Shopping cart">
                                    <tr>
                                        <th>{{ __('customer_name') }}</th>
                                        <th>{{ __('email') }}</th>
                                        <th>{{ __('status') }}</th>
                                        <th>{{ __('payment_method') }}</th>
                                        <th>{{ __('detail') }}</th>
                                    </tr>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ __($order->status) }}</td>
                                            <td>{{ __($order->payment_method) }}</td>
                                            <td>
                                                <a href="{{ route('frontend.user.my_order_detail', $order->id) }}" class="btn default btn-xs purple">
                                                    <i class="fa fa-search"></i>
                                                    {{ __('detail') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@stop
