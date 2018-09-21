<ul class="dropdown-menu" role="menu">
    @foreach($category->get('children') as $category)
        <li class="dropdown-submenu">
            <a href="{{ route('frontend.category.post', $category->get('slug')) }}">
                {{ $category->get('name') }}
                @if(count($category->get('children')))
                    <i class="fa fa-angle-right"></i>
                @endif
            </a>
            @if(count($category->get('children')))
                @include('frontend.layouts.sub-menu')
            @endif
        </li>
    @endforeach
</ul>