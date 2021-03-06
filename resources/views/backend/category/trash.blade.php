@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('category') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __($type) }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('trash') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            {!! Form::open(['route' => ['category.restore', $type]]) !!}
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
                                            <a href="{{ route('category.restore.all', $type) }}">
                                                <i class="fa fa-reply"></i>
                                                {{ __('restore_all') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('category.restore.time', ['type' => $type, 'time' => 3600]) }}">
                                                <i class="fa fa-clock-o"></i>
                                                {{ __('1_hours') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('category.restore.time', ['type' => $type, 'time' => 86400]) }}">
                                                <i class="fa fa-clock-o"></i>
                                                {{ __('24_hours') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('category.restore.time', ['type' => $type, 'time' => 604800]) }}">
                                                <i class="fa fa-clock-o"></i>
                                                {{ __('7_day') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('category.restore.time', ['type' => $type, 'time' => 2592000]) }}">
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
                                    <th>STT</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('time') }}</th>
                                    <th>{{ __('action_by') }}</th>
                                    <th>{{ __('action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $key => $category)
                                    <tr>
                                        <td>
                                            {!! Form::checkbox('categories_id[]', $category->id, null, ['class' => 'checkboxes']) !!}
                                        </td>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->deleted_at }}</td>
                                        <td>{{ $category->user->name }}</td>
                                        <td>
                                            <span data-url="{{ route('api.category.restore.item', $category->id) }}" data-message="{{ __('restore_success') }}" class="btn default btn-xs green fashion-restore-item">
                                                <i class="fa fa-reply"></i>
                                                {{ __('restore') }}
                                            </span>
                                            <span data-url="{{ route('api.category.force_delete', $category->id) }}"
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
