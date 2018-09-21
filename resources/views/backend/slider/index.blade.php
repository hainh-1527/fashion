@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('slider') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('all_sliders') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @include('backend.layouts.alert-status')
                    <div class="portlet box green-haze">
                        <div class="portlet-title">
                            <div class="caption">
                                {{ __("all_sliders") }}
                            </div>
                            <div class="actions">
                                <a href="{{ route('slider.create') }}" id="sample_editable_1_new" class="btn green">
                                    <i class="fa fa-plus"></i>
                                    {{ __('add_new') }}
                                </a>
                                <a href="{{ route('slider.trash') }}" class="btn green">
                                    <i class="fa fa-trash-o"></i>
                                    {{ __('trash') }}
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('thumbnail') }}</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('status') }}</th>
                                    <th>{{ __('time') }}</th>
                                    <th>{{ __('action_by') }}</th>
                                    <th>{{ __('action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $key => $slider)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td class="fashion-fix-image">

                                            {!! Html::image(
                                                $slider->thumbnail,
                                                $slider->name,
                                                ['class' => 'img-responsive']
                                            ) !!}

                                        </td>
                                        <td>{{ $slider->name }}</td>
                                        <td>
                                            <span class="hide">{{ __($slider->status) }}</span>

                                            {!! Form::select(
                                                'status',
                                                [
                                                    'published' => __('published'),
                                                    'not_published' => __('not_published')
                                                ],
                                                $slider->status,
                                                [
                                                    'class' => 'form-control bs-select fashion-change-status',
                                                    'data-url' => route('api.slider.update', $slider->id),
                                                    'data-message' => __('update_success')
                                                ]
                                            ) !!}

                                        </td>
                                        <td class="fashion-time">{{ $slider->updated_at }}</td>
                                        <td class="fashion-user">{{ $slider->user->name }}</td>
                                        <td>
                                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn default btn-xs purple">
                                                <i class="fa fa-edit"></i>
                                                {{ __('edit_item') }}
                                            </a>
                                            <span data-url="{{ route('api.slider.soft_delete', $slider->id) }}"
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
                            <!-- Data Ajax -->
                            <div class="hide fashion-ajax" data-user-id="{{ Auth::user()->id }}"></div>
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
            ComponentsDropdowns.init();
        });
    </script>
@endsection
