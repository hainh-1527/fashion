@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
                <li>{{ __('my_account') }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">
                    @include('frontend.layouts.sidebar-categories')
                    @include('frontend.layouts.sidebar-featured-products')
                </div>
                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
                    <h1>{{ __('my_account') }}</h1>
                    <div class="content-page">
                        <h3>{{ __('personal_info') }}</h3>
                        <div>

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

                            </div>
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">

                                {!! Form::label('address', __('address'), ['class' => 'control-label'])!!}

                                {!! Form::text('address', Auth::user()->address, ['class' => 'form-control']) !!}

                                <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('address') }}
                                        </span>
                            </div>
                            <div class="margin-top-10">

                                {!! Form::submit(__('save_change'), ['class' => 'btn btn-primary']) !!}

                            </div>

                            {!! Form::close() !!}

                        </div>
                        <hr>

                        <h3>{{ __('change_password') }}</h3>
                        <div>

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

                                {!! Form::submit(__('save_change'), ['class' => 'btn btn-primary']) !!}

                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@stop