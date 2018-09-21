@foreach($category->get('children') as $category)
    <ol class="dd-list">
        <li class="dd-item" data-id="{{ $category->get('id') }}">
            <div class="dd-handle">
                {{ $category->get('name') }}
            </div>
            @if(count($category->get('children')))
                @include('backend.category.sub_sort')
            @endif
        </li>
    </ol>
@endforeach