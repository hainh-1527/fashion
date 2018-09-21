@extends('auth.layouts.master')

@section('content')

    <div class="content">

        {!! Form::open([
            'route' => 'register',
            'class' => 'register-form',
            'method' => 'post'
        ]) !!}

        <h3>{{ __('register_account') }}</h3>
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
        <div class="form-actions">

            {!! html_entity_decode(Form::button(
                __('register') . " <i class='m-icon-swapright m-icon-white'></i>",
                [
                    'class' => 'btn blue',
                    'type' => 'submit'
                ]
            )) !!}

        </div>

        {!! Form::close() !!}

    </div>
@endsection
