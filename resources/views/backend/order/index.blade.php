@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('eCommerce') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('order') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @include('backend.layouts.alert-status')
                    <div class="portlet box green-haze">
                        <div class="portlet-title">
                            <div class="caption">
                                {{ __("order") }}
                            </div>
                            <div class="actions">
                                <a href="{{ route('order.trash') }}" class="btn green">
                                    <i class="fa fa-trash-o"></i>
                                    {{ __('trash') }}
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('customer_name') }}</th>
                                    <th>{{ __('email') }}</th>
                                    <th>{{ __('status') }}</th>
                                    <th>{{ __('payment_method') }}</th>
                                    <th>{{ __('time') }}</th>
                                    <th>{{ __('action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>
                                            <span class="hide">{{ __($order->status) }}</span>

                                            {!! Form::select(
                                                'status',
                                                [
                                                    'pending' => __('pending'),
                                                    'transport' => __('transport'),
                                                    'complete' => __('complete'),
                                                ],
                                                $order->status,
                                                [
                                                    'class' => 'form-control fashion-change-status',
                                                    'data-url' => route('api.order.update', $order->id),
                                                    'data-message' => __('update_success')
                                                ]
                                            ) !!}

                                        </td>
                                        <td>{{ __($order->payment_method) }}</td>
                                        <td class="fashion-time">{{ $order->created_at }}</td>
                                        <td>
                                            <a href="{{ route('order.edit', $order->id) }}" class="btn default btn-xs purple">
                                                <i class="fa fa-search"></i>
                                                {{ __('detail') }}
                                            </a>
                                            <span data-url="{{ route('api.order.soft_delete', $order->id) }}"
                                                  data-message="{{ __('delete_success') }}"
                                                  class="btn default btn-xs black fashion-soft-delete-item"
                                                  data-original-title="{{ __('are_you_sure') }}"
                                                  data-btn-ok-label="{{ __('yes') }}"
                                                  data-btn-cancel-label="{{ __('no') }}"
                                                  data-toggle="confirmation"
                                                  data-placement="left"
                                                  data-popout="true"
                                                  data-singleton="true"
                                                  data-btn-ok-class="btn-success"
                                                  data-btn-cancel-class="btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                                {{ __('delete') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
            TableAdvanced.init();
        });
    </script>
@endsection
