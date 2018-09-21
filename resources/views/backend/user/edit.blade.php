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
                                            'route' => ['user.update', $user->id],
                                            'method' => 'patch'
                                        ]
                                    ) !!}

                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                        {!! Form::label('name', __('name'), ['class' => 'control-label'])!!}

                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('name') }}
                                        </span>
                                    </div>
                                    <div class="form-group">

                                        {!! Form::label('email', __('email'), ['class' => 'control-label'])!!}

                                        {!! Form::text('email', $user->email, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

                                    </div>
                                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">

                                        {!! Form::label('phone', __('phone'), ['class' => 'control-label'])!!}

                                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}

                                    </div>
                                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">

                                        {!! Form::label('address', __('address'), ['class' => 'control-label'])!!}

                                        {!! Form::text('address', null, ['class' => 'form-control']) !!}

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
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection
