@extends('auth.layouts.master')

@section('content')

    <div class="content">

        {!! Form::open([
            'route' => 'password.request',
            'class' => 'forget-form',
            'method' => 'post'
        ]) !!}

        {!! Form::hidden('token', $token) !!}

        <h3>{{ __('reset_password') }}</h3>
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
                __('reset_password') . " <i class='m-icon-swapright m-icon-white'></i>",
                [
                    'class' => 'btn blue',
                    'type' => 'submit'
                ]
            )) !!}

        </div>

        {!! Form::close() !!}

    </div>
@endsection
