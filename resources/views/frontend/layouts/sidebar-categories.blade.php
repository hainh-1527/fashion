<ul class="list-group margin-bottom-25 sidebar-menu">
    <h2>{{ __('category_product') }}</h2>
    @foreach($categoriesProduct as $parent)
        <li class="list-group-item clearfix active">
            <a href="{{ route('frontend.category.product', $parent->get('slug')) }}">
                {{ $parent->get('name') }}
            </a>
            <ul class="dropdown-menu show">
                @foreach($parent->get('children') as $children)
                    <li>
                        <a href="{{ route('frontend.category.product', $children->get('slug')) }}">
                            {{ $children->get('name') }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>