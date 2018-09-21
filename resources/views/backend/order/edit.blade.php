@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('order') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('detail') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_general" data-toggle="tab">
                                            {{ __('personal_info') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_reviews" data-toggle="tab">
                                            {{ __('products') }}
                                            <span class="badge badge-success">
                                                {{ $order->products->count() }}
											</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content no-space">
                                    <div class="tab-pane active" id="tab_general">
                                        <div class="portlet box green-haze">
                                            <div class="portlet-title">
                                                <div class="caption">{{ __('personal_info') }}</div>
                                            </div>
                                            <div class="portlet-body form">
                                                {!! Form::model(
                                                    $order,
                                                    [
                                                    'route' => ['order.update', $order->id],
                                                    'method' => 'put',
                                                    'class' => 'form-horizontal form-row-seperated',
                                                    ]
                                                ) !!}

                                                <div class="form-body">
                                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                                        {!! Form::label('name', __('customer_name'), ['class' => 'control-label col-md-3 required'])!!}

                                                        <div class="col-md-9">

                                                            {!! Form::text('name', null, ['class' => 'form-control fashion-name']) !!}

                                                            <span id="name-error" class="help-block help-block-error">
                                                            {{ $errors->first('name') }}
                                                        </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                                                        {!! Form::label('email', __('email'), ['class' => 'control-label col-md-3 required'])!!}

                                                        <div class="col-md-9">

                                                            {!! Form::text('email', null, ['class' => 'form-control fashion-name']) !!}

                                                            <span id="name-error" class="help-block help-block-error">
                                                            {{ $errors->first('email') }}
                                                        </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">

                                                        {!! Form::label('address', __('address'), ['class' => 'control-label col-md-3 required'])!!}

                                                        <div class="col-md-9">

                                                            {!! Form::text('address', null, ['class' => 'form-control fashion-name']) !!}

                                                            <span id="name-error" class="help-block help-block-error">
                                                            {{ $errors->first('address') }}
                                                        </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">

                                                        {!! Form::label('phone', __('phone'), ['class' => 'control-label col-md-3 required'])!!}

                                                        <div class="col-md-9">

                                                            {!! Form::text('phone', null, ['class' => 'form-control fashion-name']) !!}

                                                            <span id="name-error" class="help-block help-block-error">
                                                            {{ $errors->first('phone') }}
                                                        </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">

                                                        {!! Form::label('payment_method', __('payment_method'), ['class' => 'control-label col-md-3'])!!}

                                                        <div class="col-md-9">

                                                            {!! Form::text('payment_method', __($order->payment_method), ['class' => 'form-control fashion-name', 'readonly' => 'readonly']) !!}

                                                        </div>
                                                    </div>

                                                    <div class="form-group">

                                                        {!! Form::label('status', __('status'), ['class' => 'control-label col-md-3']) !!}

                                                        <div class="col-md-9">

                                                            {!! Form::select(
                                                                'status',
                                                                [
                                                                    'pending' => __('pending'),
                                                                    'transport' => __('transport'),
                                                                    'complete' => __('complete'),
                                                                ],
                                                                null,
                                                                ['class' => 'form-control bs-select']
                                                            ) !!}

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">

                                                            {!! Form::submit(__('update'), ['class' => 'btn green']) !!}

                                                        </div>
                                                    </div>
                                                </div>

                                                {!! Form::close() !!}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_reviews">
                                        <div class="portlet grey-cascade box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    {{ __('products') }}
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>{{ __('thumbnail') }}</th>
                                                            <th>{{ __('name') }}</th>
                                                            <th>{{ __('price') }}</th>
                                                            <th>{{ __('quantity') }}</th>
                                                            <th>{{ __('into_money') }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($order->products as $product)
                                                            <tr>
                                                                <td class="fashion-fix-image-order-detail">

                                                                    {!! Html::image(
                                                                        $product->thumbnail,
                                                                        $product->name,
                                                                        ['class' => 'img-responsive']
                                                                    ) !!}

                                                                </td>
                                                                <td>{{ $product->name }}</td>
                                                                <td>{{ number_format($product->pivot->price) }}đ</td>
                                                                <td>{{ $product->pivot->qty }}</td>
                                                                <td>{{ number_format( $product->pivot->price * $product->pivot->qty) }}đ</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="well">
                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name">
                                                            {{ __('total_price') }}
                                                        </div>
                                                        <div class="col-md-3 value">
                                                            {{ number_format($order->total) }}đ
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

@section('script')
    <script>
        jQuery(document).ready(function () {
            FormSamples.init();
            ComponentsDropdowns.init();
            TableAdvanced.init();
        });
    </script>
@endsection
