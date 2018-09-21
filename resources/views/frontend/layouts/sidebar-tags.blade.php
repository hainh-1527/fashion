<div class="blog-tags margin-bottom-20">
    <h2>{{ __('tags') }}</h2>
    <ul>
        @foreach($tags as $tag)
            <li>
                <a href="{{ route('frontend.tag.posts', $tag->slug) }}">
                    <i class="fa fa-tags"></i>
                    {{ $tag->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>