@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('notification') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('all_notifications') }}</a>
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
                                {{ __("all_notifications") }}
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('content') }}</th>
                                    <th>{{ __('time') }}</th>
                                    <th>{{ __('action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notifications as $key => $notification)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ __($notification->data['message']) }}</td>
                                        <td>{{ $notification->created_at }}</td>
                                        @php
                                            if ($notification->notifiable_type == App\Models\Review::class) {
                                                $review = App\Models\Review::find($notification->notifiable_id);

                                                $href = route('frontend.product.show', $review->product->slug);
                                            } elseif ($notification->notifiable_type == App\Models\Comment::class) {
                                                $comment = App\Models\Comment::find($notification->notifiable_id);

                                                if ($comment->commentable_type == App\Models\Product::class) {
                                                    $href = route('frontend.product.show', $comment->commentable->slug);
                                                } elseif ($comment->commentable_type == App\Models\Post::class) {
                                                    $href = route('frontend.post.show', $comment->commentable->slug);
                                                }
                                            } elseif ($notification->notifiable_type == App\Models\Order::class) {
                                                $href = route('order.edit', $notification->notifiable_id);
                                            }
                                        @endphp
                                        <td>
                                            <a href="{{ $href }}" class="btn default btn-xs purple read-notification" data-url="{{ route('api.notification.update', $notification->id) }}">
                                                <i class="fa fa-edit"></i>
                                                {{ __('show_detail') }}
                                            </a>
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
