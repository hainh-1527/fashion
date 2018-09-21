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
                        <a href="javascript:void(0)">{{ __('edit') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_general" data-toggle="tab">
                                            {{ __('edit') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_comments" data-toggle="tab">
                                            {{ __('comment') }}
                                            <span class="badge badge-success">
                                                {{ $comments->count() }}
											</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content no-space">
                                    <div class="tab-pane active" id="tab_general">
                                        <div class="portlet box green-haze">
                                            <div class="portlet-title">
                                                <div class="caption">{{ $post->title }}</div>
                                            </div>
                                            <div class="portlet-body form">
                                                {!! Form::model(
                                                    $post,
                                                    [
                                                        'route' => ['post.update', $post->id],
                                                        'method' => 'put',
                                                        'class' => 'form-horizontal form-row-seperated',
                                                        'enctype' => 'multipart/form-data'
                                                    ]
                                                ) !!}

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
                                                                $post->categories->pluck('id'),
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
                                                                implode(',', $post->tags->pluck('name')->toArray()),
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
                                                                null,
                                                                ['class' => 'form-control bs-select']
                                                            ) !!}

                                                        </div>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">

                                                        {!! Form::label('file', __('thumbnail'), ['class' => 'control-label col-md-3']) !!}

                                                        <div class="col-md-9">

                                                            <div class="fashion-image-upload">

                                                                {!! Html::image(
                                                                    $post->thumbnail,
                                                                    $post->name,
                                                                    ['class' => 'img-responsive']
                                                                ) !!}

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

                                                            {!! Form::submit(__('update'), ['class' => 'btn green']) !!}

                                                        </div>
                                                    </div>
                                                </div>

                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                    @include('backend.comment.show')
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

@section('script')
    {{ Html::script('assets/admin/tag.js') }}
    <script>
        jQuery(document).ready(function () {
            FormSamples.init();
            ComponentsDropdowns.init();
            TableAdvanced.init();
        });
    </script>
@endsection
