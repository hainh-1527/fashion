<div class="sidebar-products clearfix margin-bottom-20">
    <h2>{{ __('featured_products') }}</h2>
    @foreach($featuredProducts as $product)
        <div class="item">
            <a href="{{ route('frontend.product.show', $product->slug) }}">

                {!! Html::image($product->thumbnail, $product->name) !!}

            </a>
            <h3>
                <a href="{{ route('frontend.product.show', $product->slug) }}">
                    {{ $product->name }}
                </a>
            </h3>
            <div class="price">{{ number_format($product->real_price) }} đ</div>
        </div>
    @endforeach
</div>