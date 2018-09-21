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
                        <a href="javascript:void(0)">{{ __('list') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @include('backend.layouts.alert-status')
                    <div class="table-toolbar margin-bottom-30">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ route('user.create') }}" id="sample_editable_1_new" class="btn green">
                                        <i class="icon-user-follow"></i>
                                        {{ __('add_new_user') }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <a href="{{ route('user.trash') }}" id="sample_editable_1_new" class="btn green">
                                        <i class="fa fa-trash-o"></i>
                                        {{ __('trash') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->role == 'admin')
                        <div class="portlet box green-haze">
                            <div class="portlet-title">
                                <div class="caption">
                                    {{ __("managers") }}
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample">
                                    <thead>
                                    <tr>
                                        <th>{{ __('STT') }}</th>
                                        <th>{{ __('name') }}</th>
                                        <th>{{ __('email') }}</th>
                                        <th>{{ __('time') }}</th>
                                        <th>{{ __('action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($managers as $key => $manager)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $manager->name }}</td>
                                            <td>{{ $manager->email }}</td>
                                            <td>{{ $manager->created_at }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', $manager->id) }}" class="btn default btn-xs purple">
                                                    <i class="fa fa-edit"></i>
                                                    {{ __('edit_item') }}
                                                </a>
                                                <span data-url="{{ route('api.user.soft_delete', $manager->id) }}"
                                                      data-message="{{ __('delete_success') }}"
                                                      class="btn default btn-xs black fashion-soft-delete-item"
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
                                                    {{ __('delete') }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    <div class="portlet box green-haze">
                        <div class="portlet-title">
                            <div class="caption">
                                {{ __("users") }}
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('email') }}</th>
                                    <th>{{ __('time') }}</th>
                                    <th>{{ __('action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn default btn-xs purple">
                                                <i class="fa fa-edit"></i>
                                                {{ __('edit_item') }}
                                            </a>
                                            <span data-url="{{ route('api.user.soft_delete', $user->id) }}"
                                                  data-message="{{ __('delete_success') }}"
                                                  class="btn default btn-xs black fashion-soft-delete-item"
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
                                                {{ __('delete') }}
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
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

@section('script')
    <script>
        jQuery(document).ready(function () {
            TableAdvanced.init();
        });
    </script>
@endsection
