@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
                <li class="active">{{ __('wish_list') }}</li>
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
                    <h1>{{ __('wish_list') }}</h1>
                    <div class="goods-page">
                        <div class="goods-data clearfix">
                            <div class="table-wrapper-responsive">
                                <table summary="Shopping cart">
                                    <tr>
                                        <th class="goods-page-image">{{ __('thumbnail') }}</th>
                                        <th class="goods-page-description">{{ __('name') }}</th>
                                        <th class="goods-page-price" colspan="2">{{ __('price') }}</th>
                                    </tr>
                                    @foreach($wishList as $product)
                                        <tr class="fashion-wish-list-{{ $product->id }}">
                                            <td class="goods-page-image">
                                                <a href="{{ route('frontend.product.show', $product->slug) }}">

                                                    {!! Html::image($product->thumbnail, $product->name) !!}

                                                </a>
                                            </td>
                                            <td class="goods-page-description">
                                                <h3>
                                                    <a href="{{ route('frontend.product.show', $product->slug) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h3>
                                            </td>
                                            <td class="goods-page-price">
                                                <strong>{{ number_format($product->real_price) }}<span>đ</span></strong>
                                            </td>
                                            <td class="del-goods-col">
                                                <a class="del-goods fashion-wish-list-destroy" data-product-id="{{ $product->id }}">&nbsp;</a>
                                                <div>
                                                    <input type="hidden" value="1" class="fashion-product-qty-{{ $product->id }}">
                                                    <a class="add-goods fashion-add-to-cart" data-product-id="{{ $product->id }}">&nbsp;</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="hide data-ajax" data-url="{{ route('frontend.cart.add') }}" data-title="{{ __('success') }}" data-message="{{ __('add_to_cart_success') }}"></div>
                                <div class="hide data-ajax-delete-product" data-url="{{ route('frontend.wish_list.destroy') }}" data-title="{{ __('success') }}" data-message="{{ __('delete_product_success') }}"></div>
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
