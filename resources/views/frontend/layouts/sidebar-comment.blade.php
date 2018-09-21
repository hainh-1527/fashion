<h2>{{ __('comment') }}</h2>
<div class="comments comment-div-">
    @foreach($comments as $parent)
        <div class="media comment-delete-{{ $parent->get('id') }}" id="comment-show-{{ $parent->get('id') }}">
            <a href="javascript:void(0)" class="pull-left">
                <img src="{{ asset('uploads/default/avatar-no.png') }}" alt="" class="media-object">
            </a>
            <div class="media-body comment-show-{{ $parent->get('id') }}">
                <h4 class="media-heading">
                    {{ $parent->get('user_name') }}
                    <span>
                        {{ $parent->get('time') }}
                        @auth
                            |
                            <a class="comment-reply" data-comment-id="{{ $parent->get('id') }}" data-user-name="{{ $parent->get('user_name') }}">
                                {{ __('reply') }}
                            </a>
                            @if (in_array(Auth::user()->role, ['manager', 'admin']) || Auth::user()->id == $parent->get('user_id'))
                                |
                                <a class="comment-delete-item" data-url="{{ route('api.comment.destroy', $parent->get('id')) }}" data-comment-delete-id="{{ $parent->get('id') }}">
                                    {{ __('delete') }}
                                </a>
                            @endif
                        @endauth
                    </span>
                </h4>
                <p>{{ $parent->get('body') }}</p>
                <div class="comment-div-{{ $parent->get('id') }}">
                    @foreach($parent->get('children') as $children)
                        <div class="media comment-delete-{{ $children->get('id') }}" id="comment-show-{{ $children->get('id') }}">
                            <a href="javascript:void(0);" class="pull-left">
                                <img src="{{ asset('uploads/default/avatar-no.png') }}" alt="" class="media-object">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    {{ $children->get('user_name') }}
                                    <span>
                                        {{ $children->get('time') }}
                                        @auth
                                            |
                                            <a class="comment-reply" data-comment-id="{{ $parent->get('id') }}" data-user-name="{{ $children->get('user_name') }}">
                                                {{ __('reply') }}
                                            </a>
                                            @if (in_array(Auth::user()->role, ['manager', 'admin']) || Auth::user()->id == $children->get('user_id'))
                                                |
                                                <a class="comment-delete-item" data-url="{{ route('api.comment.destroy', $children->get('id')) }}" data-comment-delete-id="{{ $children->get('id') }}">
                                                    {{ __('delete') }}
                                                </a>
                                            @endif
                                        @endauth
                                    </span>
                                </h4>
                                <p>{{ $children->get('body') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="comment-input fashion-comment-relative fix-relative">
                    <div class='form-group fashion-comment-input'>
                        <input type='text' class='form-control comment-body'>
                    </div>
                    <span class='btn btn-primary fashion-comment-store fix-comment' data-parent-id="{{ $parent->get('id') }}">{{ __('send')}}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
@auth
    <div class="padding-top-40 fashion-comment-relative">
        <div class="form-group">
            <textarea class="form-control comment-body" rows="5"></textarea>
        </div>
        <span class="btn btn-primary fashion-comment-store" data-parent-id="">{{ __('send')}}</span>
    </div>
    <div class="hide data-comment-ajax"
         data-avatar="{{ asset('uploads/default/avatar-no.png') }}"
         data-url="{{ route('api.comment.store') }}"
         data-user-id="{{ Auth::user()->id }}"
    ></div>
@else
    <div class="padding-top-40">
        <p><a href="{{ route('login') }}" class="fashion-link">{{ __('login') }}</a> {{ __('to_comment') }}</p>
    </div>
@endauth
<div class="data-commentable hide"
     data-commentable-id="{{ $commentable_id }}"
     data-commentable-type="{{ $commentable_type }}">
</div>