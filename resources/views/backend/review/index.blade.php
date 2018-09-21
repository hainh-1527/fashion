@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('review') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('all_reviews') }}</a>
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
                                {{ __("all_reviews") }}
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('content') }}</th>
                                    <th>{{ __('rating') }}</th>
                                    <th>{{ __('time') }}</th>
                                    <th>{{ __('review_by') }}</th>
                                    <th>{{ __('action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $key => $review)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $review->content }}</td>
                                        <td>
                                            <span class="hide">{{ $review->rating }}</span>
                                            <div class="rateit" data-rateit-value="{{ $review->rating }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                        </td>
                                        <td class="fashion-time">{{ $review->created_at }}</td>
                                        <td class="fashion-user">{{ $review->user->name }}</td>
                                        <td>
                                            <a href="{{ route('frontend.product.show', $review->product->slug) }}" target="_blank" class="btn default btn-xs purple">
                                                <i class="fa fa-edit"></i>
                                                {{ __('show_detail') }}
                                            </a>
                                            <span data-url="{{ route('review.destroy', $review->id) }}"
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
    {{ Html::script('assets/global/plugins/rateit/src/jquery.rateit.js') }}
    <script>
        jQuery(document).ready(function () {
            TableAdvanced.init();
        });
    </script>
@endsection
