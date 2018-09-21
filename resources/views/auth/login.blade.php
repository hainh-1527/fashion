@extends('auth.layouts.master')

@section('content')

    <div class="content">
        <!-- BEGIN LOGIN FORM -->

        {!! Form::open([
            'route' => 'login',
            'class' => 'login-form',
            'method' => 'post'
        ]) !!}

        <h4 class="form-title">{{ __('login_to_your_account') }}</h4>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

            {!! Form::label('email', __('username'), ['class' => 'control-label visible-ie8 visible-ie9']) !!}

            <div class="input-icon">
                <i class="fa fa-user"></i>

                {!! Form::text(
                    'email',
                    null,
                    [
                        'class' => 'form-control placeholder-no-fix',
                        'autocomplete' => 'off',
                        'placeholder' => __('username')
                    ]
                ) !!}

            </div>
            @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

            {!! Form::label('password', __('password'), ['class' => 'control-label visible-ie8 visible-ie9']) !!}

            <div class="input-icon">
                <i class="fa fa-lock"></i>

                {!! Form::password(
                    'password',
                    [
                        'class' => 'form-control placeholder-no-fix',
                        'autocomplete' => 'off',
                        'placeholder' => __('password')
                    ]
                ) !!}

            </div>
            @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-actions">

            {!! Form::checkbox('remember', 1) !!}

            {!! Form::label('remember', __('remember_me')) !!}

            {!! html_entity_decode(Form::button(
                __('login') . " <i class='m-icon-swapright m-icon-white'></i>",
                [
                    'class' => 'btn blue pull-right',
                    'type' => 'submit'
                ]
            )) !!}

        </div>
        <div class="forget-password">
            <h4>{{ __('forgot_your_password') }}</h4>
            <p>
                {{ __('no_worries_click') }}
                <a href="{{ route('password.request') }}">
                    {{ __('here') }}
                </a>
                {{ __('to_reset_your_password') }}
            </p>
        </div>
        <div class="create-account">
            <p>
                {{ __('do_not_have_an_account_yet') }}
                <a href="{{ route('register') }}" id="register-btn">
                    {{ __('create_an_account') }}
                </a>
            </p>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
