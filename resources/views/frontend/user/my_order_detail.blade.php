@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
                <li class="active">{{ __('order_detail') }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>{{ __('order_detail') }}</h1>
                    <!-- BEGIN CHECKOUT PAGE -->
                    <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

                        <!-- BEGIN CHECKOUT -->
                        <div id="checkout" class="panel panel-default">
                            <div id="checkout-content" class="panel-collapse collapse in">
                                <div class="panel-body row">
                                    <div class="col-md-6 col-sm-6">
                                        <h3>{{ __('personal_info') }}</h3>
                                        <div class="form-group">

                                            {!! Form::label('name', __('name'), ['class' => 'control-label'])!!}

                                            {!! Form::text('name', $order->name, ['class' => 'form-control', 'readonly']) !!}

                                        </div>
                                        <div class="form-group">

                                            {!! Form::label('email', __('email'), ['class' => 'control-label'])!!}

                                            {!! Form::text('email', $order->email, ['class' => 'form-control', 'readonly']) !!}

                                        </div>
                                        <div class="form-group">

                                            {!! Form::label('phone', __('phone'), ['class' => 'control-label'])!!}

                                            {!! Form::text('phone', $order->phone, ['class' => 'form-control', 'readonly']) !!}

                                        </div>
                                        <div class="form-group">

                                            {!! Form::label('address', __('address'), ['class' => 'control-label'])!!}

                                            {!! Form::text('address', $order->address, ['class' => 'form-control', 'readonly']) !!}

                                        </div>
                                        <div class="form-group">

                                            {!! Form::label('payment_method', __('payment_method'), ['class' => 'control-label'])!!}

                                            {!! Form::text('payment_method', __($order->payment_method), ['class' => 'form-control', 'readonly']) !!}

                                        </div>
                                        <div class="form-group">

                                            {!! Form::label('note', __('note'), ['class' => 'control-label'])!!}

                                            {!! Form::textarea('note', $order->note, ['class' => 'form-control', 'readonly', 'rows' => 5]) !!}

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <h3>{{ __('products') }}</h3>
                                        <div class="table-wrapper-responsive">
                                            <table>
                                                <tr>
                                                    <th class="checkout-image">{{ __('thumbnail') }}</th>
                                                    <th class="checkout-description">{{ __('name') }}</th>
                                                    <th class="checkout-quantity">{{ __('quantity') }}</th>
                                                    <th class="checkout-price">{{ __('price') }}</th>
                                                    <th class="checkout-total">{{ __('into_money') }}</th>
                                                </tr>
                                                @foreach($order->products as $product)
                                                    <tr>
                                                        <td class="checkout-image">
                                                            {!! Html::image(
                                                                $product->thumbnail,
                                                                $product->name
                                                            ) !!}
                                                        </td>
                                                        <td class="checkout-description">
                                                            <h3>{{ $product->name }}</h3>
                                                        </td>
                                                        <td class="checkout-quantity">{{ $product->pivot->qty }}</td>
                                                        <td class="checkout-price">
                                                            <strong>{{ number_format($product->pivot->price) }}<span>đ</span></strong>
                                                        </td>
                                                        <td class="checkout-total">
                                                            <strong>{{ number_format( $product->pivot->price * $product->pivot->qty) }}<span>đ</span></strong>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                        <div class="checkout-total-block">
                                            <ul>
                                                <li>
                                                    <em>{{ __('total_price') }}</em>
                                                    <strong class="price">{{ number_format($order->total) }}<span>đ</span></strong>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
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
