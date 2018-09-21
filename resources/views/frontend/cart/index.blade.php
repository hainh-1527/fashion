@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
                <li class="active">{{ __('cart') }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>{{ __('cart') }}</h1>
                    <div class="goods-page">
                        <div class="goods-data clearfix">
                            <div class="table-wrapper-responsive">
                                <table class="fashion-cart" summary="Shopping cart">
                                    <tr>
                                        <th class="goods-page-image">{{ __('thumbnail') }}</th>
                                        <th class="goods-page-description">{{ __('name') }}</th>
                                        <th class="goods-page-quantity">{{ __('quantity') }}</th>
                                        <th class="goods-page-price">{{ __('price') }}</th>
                                        <th class="goods-page-total" colspan="2">{{ __('into_money') }}</th>
                                    </tr>
                                    @foreach(Cart::content() as $cart)
                                        <tr class="cart-id-{{ $cart->rowId }}">
                                            <td class="goods-page-image">
                                                <a href="{{ route('frontend.product.show', $cart->options->slug) }}">

                                                    {!! Html::image($cart->options->thumbnail, $cart->name) !!}

                                                </a>
                                            </td>
                                            <td class="goods-page-description">
                                                <h3>
                                                    <a href="{{ route('frontend.product.show', $cart->options->slug) }}">
                                                        {{ $cart->name }}
                                                    </a>
                                                </h3>
                                            </td>
                                            <td class="goods-page-quantity">
                                                <div class="product-quantity">
                                                    <input id="product-quantity2" type="text" value="{{ $cart->qty }}" data-cart-id="{{ $cart->rowId }}" readonly class="form-control input-sm change-qty-product-cart">
                                                </div>
                                            </td>
                                            <td class="goods-page-price">
                                                <strong>{{ number_format($cart->price) }}<span>đ</span></strong>
                                            </td>
                                            <td class="goods-page-total">
                                                <strong><strong class="subtotal">{{ number_format($cart->subtotal) }}</strong><span>đ</span></strong>
                                            </td>
                                            <td class="del-goods-col">
                                                <a class="del-goods fashion-delete-item-cart" data-cart-id="{{ $cart->rowId }}">&nbsp;</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="hide data-ajax-update-cart" data-url="{{ route('frontend.cart.update') }}" data-title="{{ __('success') }}" data-message="{{ __('update_cart_success') }}"></div>
                                <div class="hide data-ajax-delete-item-cart" data-url="{{ route('frontend.cart.remove') }}" data-title="{{ __('success') }}" data-message="{{ __('delete_product_success') }}"></div>
                            </div>

                            <div class="shopping-total">
                                <ul>
                                    <li class="shopping-total-price">
                                        <em>{{ __('total_price') }}</em>
                                        <strong class="price"><b class="cart-total">{{ Cart::subtotal(0) }}</b><span>đ</span></strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('frontend.home.main') }}" class="btn btn-default">
                            {{ __('continue_shopping') }}
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <a href="{{ route('frontend.cart.checkout') }}" class="btn btn-primary">
                            {{ __('checkout') }}
                            <i class="fa fa-check"></i>
                        </a>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@stop
