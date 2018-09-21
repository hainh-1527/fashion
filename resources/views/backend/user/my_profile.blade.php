@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('my_profile') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('edit') }}</a>
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
                                    <span class="caption-subject font-blue-madison bold uppercase">{{ __('personal_info') }}</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">

                                    {!! Form::model(
                                        $user,
                                        [
                                            'route' => 'user.change_info',
                                            'method' => 'put'
                                        ]
                                    ) !!}

                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                        {!! Form::label('name', __('name'), ['class' => 'control-label'])!!}

                                        {!! Form::text('name', Auth::user()->name, ['class' => 'form-control']) !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('name') }}
                                        </span>
                                    </div>
                                    <div class="form-group">

                                        {!! Form::label('email', __('email'), ['class' => 'control-label'])!!}

                                        {!! Form::text('email', Auth::user()->email, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

                                    </div>
                                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">

                                        {!! Form::label('phone', __('phone'), ['class' => 'control-label'])!!}

                                        {!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control']) !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('phone') }}
                                        </span>
                                    </div>
                                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">

                                        {!! Form::label('address', __('address'), ['class' => 'control-label'])!!}

                                        {!! Form::text('address', Auth::user()->address, ['class' => 'form-control']) !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('address') }}
                                        </span>
                                    </div>
                                    <div class="margin-top-10">

                                        {!! Form::submit(__('save_change'), ['class' => 'btn green']) !!}

                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                        <div class="portlet light">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">{{ __('change_password') }}</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">

                                    {!! Form::open(['route' => 'user.change_password', 'method' => 'put']) !!}

                                    <div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">

                                        {!! Form::label('current_password', __('current_password'), ['class' => 'control-label'])!!}

                                        {!! Form::password('current_password', ['class' => 'form-control']) !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('current_password') }}
                                        </span>
                                    </div>

                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

                                        {!! Form::label('password', __('new_password'), ['class' => 'control-label'])!!}

                                        {!! Form::password('password', ['class' => 'form-control']) !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('password') }}
                                        </span>
                                    </div>

                                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">

                                        {!! Form::label('password_confirmation', __('re_type_new_password'), ['class' => 'control-label'])!!}

                                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('password_confirmation') }}
                                        </span>
                                    </div>

                                    <div class="margin-top-10">

                                        {!! Form::submit(__('save_change'), ['class' => 'btn green']) !!}

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
