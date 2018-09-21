@extends('backend.layouts.master')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ route('dashboard') }}">{{ __('dashboard') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                1349
                            </div>
                            <div class="desc">
                                New Feedbacks
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red-intense">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                12,5M$
                            </div>
                            <div class="desc">
                                Total Profit
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                +89%
                            </div>
                            <div class="desc">
                                Brand Popularity
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                +89%
                            </div>
                            <div class="desc">
                                Brand Popularity
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END DASHBOARD STATS -->
            <div class="clearfix">
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-share font-red-sunglo hide"></i>
                                <span class="caption-subject font-red-sunglo bold uppercase">Revenue</span>
                                <span class="caption-helper">monthly stats...</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group">
                                    <a href="" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        Filter Range<span class="fa fa-angle-down">
									</span>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                Q1 2014 <span class="label label-sm label-default">
											past </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Q2 2014 <span class="label label-sm label-default">
											past </span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="javascript:;">
                                                Q3 2014 <span class="label label-sm label-success">
											current </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Q4 2014 <span class="label label-sm label-warning">
											upcoming </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="site_activities_loading">
                                <img src="{{ asset('assets/admin/layout/img/loading.gif') }}" alt="loading"/>
                            </div>
                            <div id="site_activities_content" class="display-none">
                                <div id="site_activities" style="height: 228px;">
                                </div>
                            </div>
                            <div style="margin: 20px 0 10px 30px">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-success">
										Revenue: </span>
                                        <h3>$13,234</h3>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-info">
										Tax: </span>
                                        <h3>$134,900</h3>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-danger">
										Shipment: </span>
                                        <h3>$1,134</h3>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-warning">
										Orders: </span>
                                        <h3>235090</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-share font-blue-steel hide"></i>
                                <span class="caption-subject font-blue-steel bold uppercase">{{ __('notification') }}</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                                <ul class="feeds">
                                    @foreach($notifications as $notification)
                                        @if($notification->notifiable_type == App\Models\Review::class)
                                            @php
                                                $review = App\Models\Review::find($notification->notifiable_id);

                                                $href = route('frontend.product.show', $review->product->slug);
                                            @endphp
                                            <li>
                                                <a href="{{ $href }}" class="read-notification" data-url="{{ route('api.notification.update', $notification->id) }}">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="icon-note"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc">
                                                                    {{ __($notification->data['message']) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2 fashion-time-fix">
                                                        <div class="date">
                                                            {{ $notification->created_at }}
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @elseif($notification->notifiable_type == App\Models\Comment::class)
                                            @php
                                                $comment = App\Models\Comment::find($notification->notifiable_id);

                                                if ($comment->commentable_type == App\Models\Product::class) {
                                                    $href = route('frontend.product.show', $comment->commentable->slug);
                                                } elseif ($comment->commentable_type == App\Models\Post::class) {
                                                    $href = route('frontend.post.show', $comment->commentable->slug);
                                                }
                                            @endphp
                                            <li>
                                                <a href="{{ $href }}" class="read-notification" data-url="{{ route('api.notification.update', $notification->id) }}">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="icon-bubbles"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc">
                                                                    {{ __($notification->data['message']) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2 fashion-time-fix">
                                                        <div class="date">
                                                            {{ $notification->created_at }}
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @elseif($notification->notifiable_type == App\Models\Order::class)
                                            <li>
                                                <a href="{{ route('order.edit', $notification->notifiable_id) }}" class="read-notification" data-url="{{ route('api.notification.update', $notification->id) }}">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc">
                                                                    {{ __($notification->data['message']) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2 fashion-time-fix">
                                                        <div class="date">
                                                            {{ $notification->created_at }}
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="scroller-footer">
                                <div class="btn-arrow-link pull-right">
                                    <a href="{{ route('notification.index') }}">
                                        {{ __('view_all') }}
                                    </a>
                                    <i class="icon-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@stop

@section('script')
    @include('backend.dashboard.script')
@endsection
