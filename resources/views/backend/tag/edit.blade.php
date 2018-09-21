@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('tag') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('edit') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">{{ __('update_category') }}</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            {!! Form::model(
                                $tag,
                                [
                                    'route' => ['tag.update', $tag->id],
                                    'method' => 'put',
                                    'class' => 'form-horizontal form-row-seperated',
                                    'enctype' => 'multipart/form-data'
                                ]
                            ) !!}

                            <div class="form-body">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                    {!! Form::label('name', __('name'), ['class' => 'control-label col-md-3 required'])!!}

                                    <div class="col-md-9">

                                        {!! Form::text('name', null, ['class' => 'form-control fashion-name']) !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('name') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">

                                    {!! Form::label('status', __('status'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">

                                        {!! Form::select(
                                            'status',
                                            [
                                                'published' => __('published'),
                                                'not_published' => __('not_published')
                                            ],
                                            null,
                                            ['class' => 'form-control bs-select']
                                        ) !!}

                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">

                                        {!! Form::submit(__('update'), ['class' => 'btn green']) !!}

                                    </div>
                                </div>
                            </div>

                        {!! Form::close() !!}

                        <!-- END FORM-->
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
        jQuery(document).ready(function() {
            FormSamples.init();
            ComponentsDropdowns.init();
        });
    </script>
@endsection
