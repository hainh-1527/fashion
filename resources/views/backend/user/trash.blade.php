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
                        <a href="javascript:void(0)">{{ __('trash') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            {!! Form::open(['route' => ['user.restore']]) !!}
            <div class="row">
                <div class="col-md-12">
                    @include('backend.layouts.alert-status')
                    <div class="portlet box yellow">
                        <div class="portlet-title">
                            <div class="caption">
                                {{ __('trash') }}
                            </div>
                            <div class="actions">
                                {!! html_entity_decode(Form::button(
                                    "<i class='fa fa-reply'></i> " . __('restore'),
                                    [
                                        'class' => 'btn yellow-casablanca',
                                        'type' => 'submit'
                                    ]
                                )) !!}
                                <div class="btn-group">
                                    <a class="btn yellow-casablanca" href="javascript:void(0)" data-toggle="dropdown">
                                        <i class="fa fa-clock-o"></i>
                                        {{ __('option') }}
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="{{ route('user.restore.all') }}">
                                                <i class="fa fa-reply"></i>
                                                {{ __('restore_all') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.restore.time', 3600) }}">
                                                <i class="fa fa-clock-o"></i>
                                                {{ __('1_hours') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.restore.time', 86400) }}">
                                                <i class="fa fa-clock-o"></i>
                                                {{ __('24_hours') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.restore.time', 604800) }}">
                                                <i class="fa fa-clock-o"></i>
                                                {{ __('7_day') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.restore.time', 2592000) }}">
                                                <i class="fa fa-clock-o"></i>
                                                {{ __('30_day') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                <thead>
                                <tr>
                                    <th class="table-checkbox">
                                        {!! Form::checkbox(null, null, null, ['class' => 'group-checkable', 'data-set' => '#sample_2 .checkboxes']) !!}
                                    </th>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('email') }}</th>
                                    <th>{{ __('role') }}</th>
                                    <th>{{ __('time') }}</th>
                                    <th>{{ __('action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td>
                                            {!! Form::checkbox('users_id[]', $user->id, null, ['class' => 'checkboxes']) !!}
                                        </td>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ __($user->role) }}</td>
                                        <td>{{ $user->deleted_at }}</td>
                                        <td>
                                            <span data-url="{{ route('api.user.restore.item', $user->id) }}" data-message="{{ __('restore_success') }}" class="btn default btn-xs green fashion-restore-item">
                                                <i class="fa fa-reply"></i>
                                                {{ __('restore') }}
                                            </span>
                                            <span data-url="{{ route('api.user.force_delete', $user->id) }}"
                                                  data-message="{{ __('delete_success') }}"
                                                  class="btn default btn-xs black fashion-force-delete-item"
                                                  data-original-title="{{ __('are_you_sure') }}"
                                                  data-btn-ok-label="{{ __('yes') }}"
                                                  data-btn-cancel-label="{{ __('no') }}"
                                                  data-toggle="confirmation"
                                                  data-placement="left"
                                                  data-popout="true"
                                                  data-singleton="true"
                                                  data-btn-ok-class="btn-success"
                                                  data-btn-cancel-class="btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                                {{ __('force_delete') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

@section('script')
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
@endsection
