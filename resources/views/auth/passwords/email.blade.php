@extends('auth.layouts.master')

@section('content')

    <div class="content">

        {!! Form::open([
            'route' => 'password.email',
            'class' => 'forget-form',
            'method' => 'post'
        ]) !!}

        <h3>{{ __('forgot_your_password') }}</h3>

        <p>{{ session('status') ? session('status') : __('enter_your_email_address_below_to_reset_your_password') }}</p>

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
        <div class="form-actions">

            {!! html_entity_decode(Form::button(
                __('submit') . " <i class='m-icon-swapright m-icon-white'></i>",
                [
                    'class' => 'btn blue',
                    'type' => 'submit'
                ]
            )) !!}

        </div>

        {!! Form::close() !!}

    </div>
@endsection
