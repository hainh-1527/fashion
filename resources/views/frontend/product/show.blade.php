@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
                <li>{{ __('product_detail') }}</li>
                <li class="active">{{ $product->name }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">
                    @include('frontend.layouts.sidebar-categories')
                    @include('frontend.layouts.sidebar-featured-products')
                </div>
                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
                    <div class="product-page">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="product-main-image">

                                    {!! Html::image(
                                        $product->thumbnail,
                                        $product->name,
                                        [
                                            'class' => 'img-responsive',
                                            'data-BigImgsrc' => $product->thumbnail
                                        ]
                                    ) !!}

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h1>{{ $product->name }}</h1>
                                <div class="price-availability-block clearfix">
                                    <div class="price">
                                        <strong>{{ number_format($product->real_price) }}<span>đ</span></strong>
                                        @if($product->sale)
                                            <em><span>{{ number_format($product->price) }}</span>đ</em>
                                        @endif
                                    </div>
                                </div>
                                <div class="description">
                                    <p>{!! $product->excerpt !!}</p>
                                </div>
                                <div class="product-page-cart product-base">
                                    <div class="product-quantity">
                                        <input id="product-quantity" type="text" value="1" readonly class="form-control input-sm fashion-product-qty-{{ $product->id }}">
                                    </div>
                                    <button class="btn btn-primary fashion-add-to-cart" data-product-id="{{ $product->id }}">{{ __('add_to_cart') }}</button>
                                    @auth
                                        <button class="btn btn-primary add-to-wish-list"
                                                data-url="{{ route('frontend.wish_list.store') }}"
                                                data-product-id="{{ $product->id }}"
                                                data-title="{{ __('success') }}"
                                                data-message="{{ __('add_to_wish_list_success') }}">
                                            {{ __('favorite') }}
                                        </button>
                                    @endauth
                                </div>
                                <div class="review">
                                    <span class="product-rating">
                                        <span class="rateit" data-rateit-value="{{ $product->rating }}" data-rateit-ispreset="true" data-rateit-readonly="true"></span>
                                    </span>
                                    <a>
                                        {{ $reviews->count() }}
                                        {{ __('review') }}
                                    </a>
                                </div>
                            </div>

                            <div class="hide data-ajax" data-url="{{ route('frontend.cart.add') }}" data-title="{{ __('success') }}" data-message="{{ __('add_to_cart_success') }}"></div>

                            <div class="product-page-content">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#Description" data-toggle="tab">{{ __('description') }}</a></li>
                                    <li><a href="#Comment" data-toggle="tab">{{ __('comment') }}</a></li>
                                    <li><a href="#Reviews" data-toggle="tab">
                                            {{ __('review') }}
                                            ({{ $reviews->count() }})
                                        </a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="Description">
                                        <p>{!! $product->description !!}</p>
                                    </div>
                                    <div class="tab-pane fade" id="Comment">
                                        <div class="fashion-product-comment blog-item">
                                            @include('frontend.layouts.sidebar-comment')
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <div class="fashion-review-append">
                                            @foreach($reviews as $review)
                                                <div class="review-item clearfix">
                                                    <div class="review-item-submitted">
                                                        <strong>{{ $review->user->name }}</strong>
                                                        <em>{{ $review->created_at }}</em>
                                                        <div class="rateit" data-rateit-value="{{ $review->rating }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                                    </div>
                                                    <div class="review-item-content">
                                                        <p>{{ $review->content }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="reviews-form" role="form">
                                            <div class="form-group">
                                                <textarea class="form-control fashion-review-content" rows="4" id="review"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="backing5">{{ __('rating') }}</label>
                                                <input type="range" class="fashion-review-rating" value="5" step="1" id="backing5">
                                                <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                                                </div>
                                            </div>
                                            <div class="padding-top-20">
                                                <span class="btn btn-primary fashion-review-store" data-url="{{ route('review.store') }}" data-product-id="{{ $product->id }}">{{ __('send') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($product->sale)
                                <div class="sticker sticker-sale"></div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

            <!-- BEGIN SIMILAR PRODUCTS -->
            <div class="row margin-bottom-40">
                <div class="col-md-12 col-sm-12">
                    <h2>{{ __('same_category') }}</h2>
                    <div class="owl-carousel owl-carousel4">
                        @foreach($samCategory as $category)
                            @foreach($category->products as $product)
                                <div>
                                    @include('frontend.layouts.sidebar-product-item')
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- END SIMILAR PRODUCTS -->
        </div>
    </div>
@stop
