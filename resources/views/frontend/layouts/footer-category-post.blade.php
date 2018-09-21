<ul class="list-unstyled">
    @foreach($category->get('children') as $category)
        <li>
            <i class="fa fa-angle-right"></i>
            <a href="{{ route('frontend.category.post', $category->get('slug')) }}">
                {{ $category->get('name') }}
            </a>
            @include('frontend.layouts.footer-category-post')
        </li>
    @endforeach
</ul>