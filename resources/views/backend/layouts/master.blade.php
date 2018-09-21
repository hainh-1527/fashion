<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>Metronic | Form Stuff - Form Layouts</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <base href="{{ asset('/') }}">

    <link rel="shortcut icon" href="{{ asset('uploads/default/favicon.png') }}"/>
    @include('backend.layouts.style')
</head>
<body class="page-header-fixed page-quick-sidebar-over-content ">
@include('backend.layouts.header')
<div class="page-container">

    @include('backend.layouts.sidebar')

    @yield('content')

    @include('backend.layouts.quick-sidebar')

</div>
@include('backend.layouts.footer')
@include('backend.layouts.script')
@yield('script')
</body>
</html>
