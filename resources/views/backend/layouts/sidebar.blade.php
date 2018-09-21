<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="margin-top-15">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i>
                    <span class="title">{{ __('dashboard') }}</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="icon-user"></i>
                    <span class="title">{{ Auth::user()->name }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
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
            <li>
                <a href="javascript:void(0);">
                    <i class="icon-list"></i>
                    <span class="title">{{ __('category') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('category.index', 'post') }}">
                            <i class="icon-speech"></i>
                            {{ __('post') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.index', 'product') }}">
                            <i class="icon-handbag"></i>
                            {{ __('product') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i class="icon-speech"></i>
                    <span class="title">{{ __('post') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('post.index') }}">
                            <i class="icon-speech"></i>
                            {{ __('all_posts') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('post.create') }}">
                            <i class="icon-plus"></i>
                            {{ __('add_new_post') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tag.index') }}">
                            <i class="icon-tag"></i>
                            {{ __('tag') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('comment.index') }}">
                    <i class="icon-bubbles"></i>
                    <span class="title">{{ __('feedback') }}</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i class="icon-handbag"></i>
                    <span class="title">{{ __('product') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('product.index') }}">
                            <i class="icon-handbag"></i>
                            {{ __('all_products') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.create') }}">
                            <i class="icon-plus"></i>
                            {{ __('add_new_product') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('review.index') }}">
                            <i class="icon-note"></i>
                            {{ __('review') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="icon-basket"></i>
                    <span class="title">{{ __('eCommerce') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('order.index') }}">
                            <i class="icon-basket"></i>
                            {{ __('order') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customer.index') }}">
                            <i class="icon-users"></i>
                            {{ __('customer') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i class="icon-grid"></i>
                    <span class="title">{{ __('brand') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('brand.index') }}">
                            <i class="icon-grid"></i>
                            {{ __('all_brands') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('brand.create') }}">
                            <i class="icon-plus"></i>
                            {{ __('add_new_brand') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i class="icon-equalizer"></i>
                    <span class="title">{{ __('slider') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('slider.index') }}">
                            <i class="icon-equalizer"></i>
                            {{ __('all_sliders') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('slider.create') }}">
                            <i class="icon-plus"></i>
                            {{ __('add_new_slider') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('notification.index') }}">
                    <i class="icon-bell"></i>
                    <span class="title">{{ __('notification') }}</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
