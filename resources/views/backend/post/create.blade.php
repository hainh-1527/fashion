@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('post') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('add_new') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box green-haze">
                        <div class="portlet-title">
                            <div class="caption">{{ __('add_new_post') }}</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            {!! Form::open([
                                'route' => 'post.store',
                                'class' => 'form-horizontal form-row-seperated',
                                'enctype' => 'multipart/form-data'
                            ]) !!}

                            <div class="form-body">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

                                    {!! Form::label('title', __('title'), ['class' => 'control-label col-md-3 required'])!!}

                                    <div class="col-md-9">

                                        {!! Form::text('title', null, ['class' => 'form-control fashion-name']) !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('title') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">

                                    {!! Form::label('excerpt', __('excerpt'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">

                                        {!! Form::textarea('excerpt' , null, ['class' => 'ckeditor form-control', 'rows' => 6]) !!}

                                    </div>
                                </div>
                                <div class="form-group">

                                    {!! Form::label('description', __('description'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">

                                        {!! Form::textarea('description' , null, ['class' => 'ckeditor form-control', 'rows' => 6]) !!}

                                    </div>
                                </div>
                                <div class="form-group">

                                    {!! Form::label('categories_id', __('category'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">

                                        {!! Form::select(
                                            'categories_id[]',
                                            $categories,
                                            null,
                                            [
                                                'class' => 'form-control bs-select',
                                                'multiple',
                                            ]
                                        ) !!}

                                    </div>
                                </div>
                                <div class="form-group">

                                    {!! Form::label('tags', __('tag'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">

                                        {!! Form::hidden(
                                            'tags',
                                            null,
                                            [
                                                'id' => 'select2_sample5',
                                                'class' => 'form-control select2 fashion-tag-select2',
                                                'data-url' => route('api.tag.index')
                                            ]
                                        ) !!}

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
                                            'published',
                                            ['class' => 'form-control bs-select']
                                        ) !!}

                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">

                                    {!! Form::label('file', __('thumbnail'), ['class' => 'control-label col-md-3 required']) !!}

                                    <div class="col-md-9">

                                        <div class="fashion-image-upload">

                                            {!! Html::image('uploads/default/no-image.png', '', ['class' => 'img-responsive']) !!}

                                        </div>

                                        {!! Form::file('file', ['class' => 'fashion-upload-file']); !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('file') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">

                                        {!! Form::submit(__('add'), ['class' => 'btn green']) !!}

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
    {{ Html::script('assets/admin/tag.js') }}
    <script>
        jQuery(document).ready(function () {
            FormSamples.init();
            ComponentsDropdowns.init();
        });
    </script>
@endsection
