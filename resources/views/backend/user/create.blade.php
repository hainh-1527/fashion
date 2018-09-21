@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('manager_user') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('add_new') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        @include('backend.layouts.alert-status')
                        <div class="portlet light">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">{{ __('add_new_user') }}</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">

                                    {!! Form::open([
                                        'route' => 'register',
                                        'class' => 'register-form',
                                        'method' => 'post'
                                    ]) !!}

                                    <p>{{ __('personal_info') }}</p>
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                        {!! Form::label('name', __('name'), ['class' => 'control-label visible-ie8 visible-ie9']) !!}

                                        <div class="input-icon">
                                            <i class="fa fa-font"></i>

                                            {!! Form::text(
                                                'name',
                                                null,
                                                [
                                                    'class' => 'form-control placeholder-no-fix',
                                                    'placeholder' => __('name')
                                                ]
                                            ) !!}

                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                                        {!! Form::label('email', __('email'), ['class' => 'control-label visible-ie8 visible-ie9']) !!}

                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>

                                            {!! Form::email(
                                                'email',
                                                null,
                                                [
                                                    'class' => 'form-control placeholder-no-fix',
                                                    'autocomplete' => 'off',
                                                    'placeholder' => __('email')
                                                ]
                                            ) !!}

                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">

                                        {!! Form::label('phone', __('phone'), ['class' => 'control-label visible-ie8 visible-ie9']) !!}

                                        <div class="input-icon">
                                            <i class="fa fa-phone"></i>

                                            {!! Form::text(
                                                'phone',
                                                null,
                                                [
                                                    'class' => 'form-control placeholder-no-fix',
                                                    'autocomplete' => 'off',
                                                    'placeholder' => __('phone')
                                                ]
                                            ) !!}

                                        </div>
                                        @if ($errors->has('phone'))
                                            <span class="help-block">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">

                                        {!! Form::label('address', __('address'), ['class' => 'control-label visible-ie8 visible-ie9']) !!}

                                        <div class="input-icon">
                                            <i class="fa fa-check"></i>

                                            {!! Form::text(
                                                'address',
                                                null,
                                                [
                                                    'class' => 'form-control placeholder-no-fix',
                                                    'autocomplete' => 'off',
                                                    'placeholder' => __('address')
                                                ]
                                            ) !!}

                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="help-block">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                    @if(Auth::user()->role == 'admin')
                                        <div class="form-group form-md-radios">
                                            <label>{{ __('role') }}</label>
                                            <div class="md-radio-inline">
                                                <div class="md-radio has-error">

                                                    {!! Form::radio('role', 'manager', true, ['class' => 'md-radiobtn', 'id' => 'radio10']) !!}

                                                    <label for="radio10">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        {{ __('manager') }}
                                                    </label>
                                                </div>
                                                <div class="md-radio has-success">

                                                    {!! Form::radio('role', 'user', false, ['class' => 'md-radiobtn', 'id' => 'radio11']) !!}

                                                    <label for="radio11">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        {{ __('user') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <p>{{ __('password') }}</p>
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

                                        {!! Form::label('password', __('password'), ['class' => 'control-label visible-ie8 visible-ie9']) !!}

                                        <div class="input-icon">
                                            <i class="fa fa-lock"></i>

                                            {!! Form::password(
                                                'password',
                                                [
                                                    'class' => 'form-control placeholder-no-fix',
                                                    'autocomplete' => 'off',
                                                    'id' => 'register_password',
                                                    'placeholder' => __('password')
                                                ]
                                            ) !!}

                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">

                                        {!! Form::label('password_confirmation', __('re_type_new_password'), ['class' => 'control-label visible-ie8 visible-ie9']) !!}

                                        <div class="input-icon">
                                            <i class="fa fa-check"></i>

                                            {!! Form::password(
                                                'password_confirmation',
                                                [
                                                    'class' => 'form-control placeholder-no-fix',
                                                    'autocomplete' => 'off',
                                                    'placeholder' => __('re_type_password')
                                                ]
                                            ) !!}

                                        </div>
                                    </div>

                                    <div class="margin-top-10">

                                        {!! Form::submit(__('add_new'), ['class' => 'btn green']) !!}

                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection
