@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">Trang chủ</a></li>
                <li>{{ __('tag') }}</li>
                <li class="active">{{ $tag->name }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="content-page">
                        <div class="row">
                            <!-- BEGIN LEFT SIDEBAR -->
                            <div class="col-md-9 col-sm-7 blog-posts">
                                @foreach($posts as $post)
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">

                                            {!! Html::image(
                                                $post->thumbnail,
                                                $post->name,
                                                ['class' => 'img-responsive fashion-full-with']
                                            ) !!}

                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <h2>
                                                <a href="{{ route('frontend.post.show', $post->slug) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h2>
                                            <ul class="blog-info">
                                                <li>
                                                    <i class="fa fa-user"></i>
                                                    {{ $post->user->name }}
                                                </li>
                                                <li>
                                                    <i class="fa fa-calendar"></i>
                                                    {{ $post->created_at }}
                                                </li>
                                                <li><i class="fa fa-comments"></i> {{ $post->comments->count() }}</li>
                                                <li>
                                                    @if($post->tags->count())
                                                        <i class="fa fa-tags"></i>
                                                        {{ implode(', ', $post->tags->pluck('name')->toArray()) }}
                                                    @endif
                                                </li>
                                            </ul>
                                            <p>{!! $post->excerpt !!}</p>
                                            <a href="{{ route('frontend.post.show', $post->slug) }}" class="more">
                                                {{ __('read_more') }}
                                                <i class="icon-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <hr class="blog-post-sep">
                                @endforeach
                                {{ $posts->links('frontend.category.paging-post') }}
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
