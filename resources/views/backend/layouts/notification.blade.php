<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="icon-bell"></i>
        <span class="badge badge-default">
            {{ $count }}
        </span>
    </a>
    <ul class="dropdown-menu">
        <li class="external">
            <h3>
                <span class="bold">
                    {{ $count }}
                </span>
                {{ __('notification') }}
            </h3>
            <a href="{{ route('notification.index') }}">
                {{ __('view_all') }}
            </a>
        </li>
        <li>
            <ul class="dropdown-menu-list fashion-notification scroller" data-handle-color="#637283">
                @foreach($notifications as $notification)
                    <li>
                        @if($notification->notifiable_type == App\Models\Review::class)
                            @php
                                $review = App\Models\Review::find($notification->notifiable_id);

                                $href = route('frontend.product.show', $review->product->slug);
                            @endphp
                            <a class="read-notification {{ $notification->unread() ? 'unread' : '' }}" data-url="{{ route('api.notification.update', $notification->id) }}" href="{{ $href }}">
                                <span class="time">{{ $notification->created_at }}</span>
                                <span class="details">
                                    <span class="label label-sm label-icon label-success">
                                        <i class="icon-note"></i>
                                    </span>
                                    {{ __($notification->data['message']) }}
                                </span>
                            </a>
                        @elseif($notification->notifiable_type == App\Models\Comment::class)
                            @php
                                $comment = App\Models\Comment::find($notification->notifiable_id);

                                if ($comment->commentable_type == App\Models\Product::class) {
                                    $href = route('frontend.product.show', $comment->commentable->slug);
                                } elseif ($comment->commentable_type == App\Models\Post::class) {
                                    $href = route('frontend.post.show', $comment->commentable->slug);
                                }
                            @endphp
                            <a class="read-notification {{ $notification->unread() ? 'unread' : '' }}" data-url="{{ route('api.notification.update', $notification->id) }}" href="{{ $href }}">
                                <span class="time">{{ $notification->created_at }}</span>
                                <span class="details">
                                    <span class="label label-sm label-icon label-success">
                                        <i class="icon-bubbles"></i>
                                    </span>
                                    {{ __($notification->data['message']) }}
                                </span>
                            </a>
                        @elseif($notification->notifiable_type == App\Models\Order::class)
                            <a class="read-notification {{ $notification->unread() ? 'unread' : '' }}" href="{{ route('order.edit', $notification->notifiable_id) }}" data-url="{{ route('api.notification.update', $notification->id) }}">
                                <span class="time">{{ $notification->created_at }}</span>
                                <span class="details">
                                    <span class="label label-sm label-icon label-success">
                                        <i class="fa fa-shopping-cart"></i>
                                    </span>
                                    {{ __($notification->data['message']) }}
                                </span>
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</li>