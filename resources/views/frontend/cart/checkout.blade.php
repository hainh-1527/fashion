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

                                    {!! Form::model($user, ['route' => 'frontend.order.store']) !!}

                                    <div class="col-md-6 col-sm-6">
                                        <h3>{{ __('personal_info') }}</h3>
                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                            {!! Form::label('name', __('name'), ['class' => 'control-label required'])!!}

                                            {!! Form::text('name', null, ['class' => 'form-control']) !!}

                                            <span id="name-error" class="help-block help-block-error">
                                                {{ $errors->first('name') }}
                                            </span>
                                        </div>
                                        <div class="form-group">

                                            {!! Form::label('email', __('email'), ['class' => 'control-label required'])!!}

                                            {!! Form::text('email', null, ['class' => 'form-control']) !!}

                                        </div>
                                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">

                                            {!! Form::label('phone', __('phone'), ['class' => 'control-label required'])!!}

                                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}

                                            <span id="name-error" class="help-block help-block-error">
                                                {{ $errors->first('phone') }}
                                            </span>
                                        </div>
                                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">

                                            {!! Form::label('address', __('address'), ['class' => 'control-label required'])!!}

                                            {!! Form::text('address', null, ['class' => 'form-control']) !!}

                                            <span id="name-error" class="help-block help-block-error">
                                                {{ $errors->first('address') }}
                                            </span>
                                        </div>
                                        <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">

                                            {!! Form::label('note', __('note'), ['class' => 'control-label'])!!}

                                            {!! Form::textarea('note', null, ['class' => 'form-control', 'rows' => 5]) !!}

                                        </div>
                                        <div class="form-group">

                                            {!! Form::label('payment_method', __('payment_method'), ['class' => 'control-label'])!!}

                                            <div class="md-radio-inline">
                                                <div class="md-radio has-error">

                                                    {!! Form::radio('payment_method', 'pay_check', true, ['class' => 'md-radiobtn', 'id' => 'radio10']) !!}

                                                    <label for="radio10">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        {{ __('pay_check') }}
                                                    </label>
                                                </div>
                                                <div class="md-radio has-success">

                                                    {!! Form::radio('payment_method', 'credit_card', false, ['class' => 'md-radiobtn', 'id' => 'radio11']) !!}

                                                    <label for="radio11">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        {{ __('credit_card') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <h3>{{ __('cart') }}</h3>
                                        <div class="table-wrapper-responsive">
                                            <table>
                                                <tr>
                                                    <th class="checkout-image">{{ __('thumbnail') }}</th>
                                                    <th class="checkout-description">{{ __('name') }}</th>
                                                    <th class="checkout-quantity">{{ __('quantity') }}</th>
                                                    <th class="checkout-price">{{ __('price') }}</th>
                                                    <th class="checkout-total">{{ __('into_money') }}</th>
                                                </tr>
                                                @foreach(Cart::content() as $cart)
                                                    <tr>
                                                        <td class="checkout-image">
                                                            <a href="{{ route('frontend.product.show', $cart->options->slug) }}">

                                                                {!! Html::image($cart->options->thumbnail, $cart->name) !!}

                                                            </a>
                                                        </td>
                                                        <td class="checkout-description">
                                                            <h3>
                                                                <a href="{{ route('frontend.product.show', $cart->options->slug) }}">
                                                                    {{ $cart->name }}
                                                                </a>
                                                            </h3>
                                                        </td>
                                                        <td class="checkout-quantity">{{ $cart->qty }}</td>
                                                        <td class="checkout-price">
                                                            <strong>{{ number_format($cart->price) }}<span>đ</span></strong>
                                                        </td>
                                                        <td class="checkout-total">
                                                            <strong>{{ number_format($cart->subtotal) }}<span>đ</span></strong>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                        <div class="checkout-total-block">
                                            <ul>
                                                <li>
                                                    <em>{{ __('total_price') }}</em>
                                                    <strong class="price">{{ Cart::subtotal(0) }}<span>đ</span></strong>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        <button class="btn btn-primary pull-right" type="submit" id="button-confirm">{{ __('checkout') }}</button>
                                    </div>

                                    {!! Form::close() !!}

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
