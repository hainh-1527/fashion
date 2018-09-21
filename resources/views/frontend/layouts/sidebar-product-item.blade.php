<div class="product-item">
    <div class="pi-img-wrapper">

        {!! Html::image($product->thumbnail, $product->name, ['class' => 'img-responsive fashion-full-with']) !!}

        <div>
            <a href="{{ $product->thumbnail }}" class="btn btn-default fancybox-button">{{ __('zoom') }}</a>
            <a href="#product-pop-up-{{ $product->id }}" class="btn btn-default fancybox-fast-view">{{ __('view') }}</a>
        </div>
    </div>
    <h3>
        <a href="{{ route('frontend.product.show', $product->slug) }}">
            {{ $product->name }}
        </a>
    </h3>
    <div class="pi-price">{{ number_format($product->real_price) }} đ</div>
    @if($product->sale)
        <div class="sticker sticker-sale"></div>
    @endif
    <div id="product-pop-up-{{ $product->id }}" class="fashion-product-pop-up">
        <div class="product-page product-pop-up">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                    <div class="product-main-image">

                        {!! Html::image($product->thumbnail, $product->name, ['class' => 'img-responsive']) !!}

                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                    <h2>{{ $product->name }}</h2>
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
                            <input type="text" value="1" readonly name="product-quantity" class="form-control input-sm fashion-product-qty-{{ $product->id }}">
                        </div>
                        <button class="btn btn-primary fashion-add-to-cart" data-product-id="{{ $product->id }}">{{ __('add_to_cart') }}</button>
                        <a href="{{ route('frontend.product.show', $product->slug) }}" class="btn btn-default">{{ __('detail') }}</a>
                    </div>
                </div>
                @if($product->sale)
                    <div class="sticker sticker-sale"></div>
                @endif
            </div>
        </div>
    </div>
</div>