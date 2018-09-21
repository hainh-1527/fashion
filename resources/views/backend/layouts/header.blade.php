<div class="page-header -i navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('uploads/default/logo.png') }}" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
            </div>
        </div>
        <a href="javascript:void(0)" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                @include('backend.layouts.notification')
                @include('backend.layouts.user')
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"></div>
