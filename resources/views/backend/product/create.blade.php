@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('product') }}</a>
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
                            <div class="caption">{{ __('add_new_product') }}</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            {!! Form::open([
                                'route' => 'product.store',
                                'class' => 'form-horizontal form-row-seperated',
                                'enctype' => 'multipart/form-data'
                            ]) !!}

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
                                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">

                                    {!! Form::label('price', __('price'), ['class' => 'control-label col-md-3'])!!}

                                    <div class="col-md-3">

                                        <div class="input-inline input-medium">
                                            {!! Form::text('price', 0, ['class' => 'form-control fashion-name']) !!}
                                        </div>

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('price') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('sale') ? 'has-error' : '' }}">

                                    {!! Form::label('sale', __('sale'), ['class' => 'control-label col-md-3'])!!}

                                    <div class="col-md-9">

                                        <div class="input-inline input-medium">
                                            {!! Form::text('sale', 0, ['class' => 'form-control']) !!}
                                        </div>

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('sale') }}
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

                                    {!! Form::label('brand_id', __('brand'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">

                                        {!! Form::select(
                                            'brand_id',
                                            $brands,
                                            null,
                                            ['class' => 'form-control select2me']
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

                                <div class="form-group {{ $errors->has('feature') ? 'has-error' : '' }}">

                                    {!! Form::label('feature', __('feature'), ['class' => 'control-label col-md-3'])!!}

                                    <div class="col-md-9">

                                        {!! Form::checkbox(
                                            'feature',
                                            1,
                                            false,
                                            [
                                                'class' => 'make-switch',
                                                'data-on-text' => "<i class='fa fa-check'></i>",
                                                'data-off-text' => "<i class='fa fa-times'></i>"
                                            ]
                                        ) !!}

                                        <span id="name-error" class="help-block help-block-error">
                                            {{ $errors->first('feature') }}
                                        </span>
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
    <script>
        jQuery(document).ready(function () {
            FormSamples.init();
            ComponentsDropdowns.init();
        });
    </script>
@endsection
