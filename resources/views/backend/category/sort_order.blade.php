@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('category') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('category.index', $type) }}">{{ __($type) }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('custom_position') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box green-haze">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-sort-numeric-asc"></i>
                                {{ __('custom_position') }}
                            </div>
                            <div class="actions">
                                <span data-url="{{ route('api.category.sort_order') }}" data-message="{{ __('update_success') }}" class="btn green fashion-save-sort-order">
                                    <i class="fa fa-save"></i>
                                    {{ __('save') }}
                                </span>
                            </div>
                        </div>
                        <div class="portlet-body ">
                            <div class="dd" id="nestable_list_1">
                                <ol class="dd-list">
                                    @foreach($categories as $category)
                                        <li class="dd-item" data-id="{{ $category->get('id') }}">
                                            <div class="dd-handle">
                                                {{ $category->get('name') }}
                                            </div>
                                            @if(count($category->get('children')))
                                                @include('backend.category.sub_sort')
                                            @endif
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        {{--data ajax--}}
                        <div class="fashion-nestable" data-max-depth="{{ $type == 'product' ? 2 : 4 }}"></div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection
