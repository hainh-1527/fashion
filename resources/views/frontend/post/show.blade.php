@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">Trang chủ</a></li>
                <li>{{ __('detail_post') }}</li>
                <li class="active">{{ $post->title }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="content-page">
                        <div class="row">
                            <!-- BEGIN LEFT SIDEBAR -->
                            <div class="col-md-9 col-sm-9 blog-item">
                                <h2><a href="{{ route('frontend.post.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                <p>{!! $post->description !!}</p>
                                <ul class="blog-info">
                                    <li><i class="fa fa-user"></i>{{ $post->user->name }}</li>
                                    <li><i class="fa fa-calendar"></i>{{ $post->created_at }}</li>
                                    <li><i class="fa fa-comments"></i>{{ $comments->count() }}</li>
                                    <li>
                                        @if(count($post->tags))
                                            <i class="fa fa-tags"></i>
                                            {{ implode(', ', $post->tags->pluck('name')->toArray()) }}
                                        @endif
                                    </li>
                                </ul>
                                @include('frontend.layouts.sidebar-comment')
                            </div>
                            <!-- END LEFT SIDEBAR -->

                            <!-- BEGIN RIGHT SIDEBAR -->
                            <div class="sidebar col-md-3 col-sm-5">
                                @include('frontend.layouts.sidebar-featured-products')
                                @include('frontend.layouts.sidebar-tags')
                            </div>
                            <!-- END RIGHT SIDEBAR -->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@stop
