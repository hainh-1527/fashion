<ul class="breadcrumb">
    <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
    <li>{{ __('category') }}</li>
    @foreach($breadcrumbs as $breadcrumb)
        <li>
            <a href="{{ route('frontend.category.post', $breadcrumb->get('slug')) }}">
                {{ $breadcrumb->get('name') }}
            </a>
        </li>
    @endforeach
    <li class="active">{{ $category->name }}</li>
</ul>