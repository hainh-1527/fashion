<li class="dropdown dropdown-user">
    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <img alt="" class="img-circle" src="{{ asset('uploads/default/avatar-no.png') }}"/>
        <span class="username username-hide-on-mobile">{{ Auth::user()->name }}</span>
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-default">
        <li>
            <a href="{{ route('user.my_profile') }}">
                <i class="icon-user"></i>
                {{ __('my_profile') }}
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}">
                <i class="icon-users"></i>
                {{ __('manager_user') }}
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="icon-key"></i>
                {{ __('logout') }}
            </a>

            {!! Form::open(['route' => 'logout', 'class' => 'hide', 'id' => 'logout-form']) !!}

            {!! Form::close() !!}

        </li>
    </ul>
</li>